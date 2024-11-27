<?php

namespace Adapters\Repositories;

use Entities\Ticket;
use Infrastructures\Databases\DatabaseConnection;
use PDO;

class TicketRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getConnection();
    }

    public function create(Ticket $ticket): bool
    {
        if (
            !$this->foreignKeyExists('jadwal', 'idjadwal', $ticket->idjadwal) ||
            !$this->foreignKeyExists('studio', 'idstudio', $ticket->idstudio) ||
            !$this->foreignKeyExists('price', 'idprice', $ticket->idprice)
        ) {
            return false;
        }

        $sql = "SELECT idticket, booked_seats, total_price 
            FROM ticket 
            WHERE idjadwal = ? 
            AND idstudio = ? 
            AND idprice = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $ticket->idjadwal,
            $ticket->idstudio,
            $ticket->idprice
        ]);

        $existingTicket = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingTicket) {
            $existingSeats = array_filter(explode(', ', $existingTicket['booked_seats']));
            $newSeats = array_filter(explode(', ', $ticket->booked_seats));
            $mergedSeats = array_unique(array_merge($existingSeats, $newSeats));
            $mergedSeatsString = implode(', ', $mergedSeats);

            $newTotalPrice = $existingTicket['total_price'] + $ticket->total_price;

            $updateSql = "UPDATE ticket 
                     SET booked_seats = ?, 
                         total_price = ? 
                     WHERE idticket = ?";

            $updateStmt = $this->db->prepare($updateSql);
            return $updateStmt->execute([
                $mergedSeatsString,
                $newTotalPrice,
                $existingTicket['idticket']
            ]);
        } else {
            $insertSql = "INSERT INTO ticket (idjadwal, idstudio, idprice, booked_seats, total_price) 
                     VALUES (?, ?, ?, ?, ?)";

            $insertStmt = $this->db->prepare($insertSql);
            return $insertStmt->execute([
                $ticket->idjadwal,
                $ticket->idstudio,
                $ticket->idprice,
                $ticket->booked_seats,
                $ticket->total_price,
            ]);
        }
    }

    public function fetchAll(): array
    {
        $sql = "SELECT t.idticket, j.tanggal, j.jam, p.kategori, t.total_price, s.nama_studio, s.jumlah_kursi_baris, s.jumlah_kursi_kolom, t.booked_seats
            FROM ticket t
            LEFT JOIN jadwal j ON t.idjadwal = j.idjadwal
            LEFT JOIN studio s ON t.idstudio = s.idstudio
            LEFT JOIN price p ON t.idprice = p.idprice";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchById(int $idticket): array
    {
        $sql = "SELECT t.idticket, j.idjadwal, s.idstudio, p.idprice, j.tanggal, j.jam, p.kategori, t.total_price, s.nama_studio, s.jumlah_kursi_baris, s.jumlah_kursi_kolom, t.booked_seats
            FROM ticket t
            LEFT JOIN jadwal j ON t.idjadwal = j.idjadwal
            LEFT JOIN studio s ON t.idstudio = s.idstudio
            LEFT JOIN price p ON t.idprice = p.idprice
            WHERE t.idticket = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idticket]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchByJadwalId(int $idjadwal): array
    {
        $sql = "SELECT booked_seats
        FROM ticket
        WHERE idjadwal = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idjadwal]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: ['booked_seats' => ''];
    }

    public function update(Ticket $ticket): bool
    {
        $sql = "SELECT idticket, booked_seats, total_price 
            FROM ticket 
            WHERE idjadwal = ? 
            AND idstudio = ? 
            AND idprice = ? 
            AND idticket = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $ticket->idjadwal,
            $ticket->idstudio,
            $ticket->idprice,
            $ticket->idticket
        ]);

        $existingTicket = $stmt->fetch(PDO::FETCH_ASSOC);

        $existingSeats = array_filter(explode(', ', $existingTicket['booked_seats']));
        $newSeats = array_filter(explode(', ', $ticket->booked_seats));
        $mergedSeats = array_unique(array_merge($existingSeats, $newSeats));
        $mergedSeatsString = implode(', ', $mergedSeats);

        $newTotalPrice = $existingTicket['total_price'] + $ticket->total_price;

        $this->db->beginTransaction();

        try {
            $updateSql = "UPDATE ticket 
                         SET booked_seats = ?, 
                             total_price = ? 
                         WHERE idticket = ?";

            $updateStmt = $this->db->prepare($updateSql);
            $result = $updateStmt->execute([
                $mergedSeatsString,
                $newTotalPrice,
                $existingTicket['idticket']
            ]);

            if ($result) {
                $this->db->commit();
                return true;
            } else {
                $this->db->rollBack();
                return false;
            }
        } catch (\Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }

    public function delete(int $idticket): bool
    {
        $sql = "DELETE FROM ticket WHERE idticket = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$idticket]);
    }

    private function foreignKeyExists(string $table, string $column, ?int $value): bool
    {
        if (is_null($value)) return true;
        $sql = "SELECT COUNT(*) FROM $table WHERE $column = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$value]);
        return $stmt->fetchColumn() > 0;
    }
}
