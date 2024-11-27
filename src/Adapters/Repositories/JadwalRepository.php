<?php

namespace Adapters\Repositories;

use Entities\Jadwal;
use Infrastructures\Databases\DatabaseConnection;
use PDO;

class JadwalRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getConnection();
    }

    public function create(Jadwal $jadwal): bool
    {
        if (
            !$this->foreignKeyExists('studio', 'idstudio', $jadwal->idstudio) ||
            !$this->foreignKeyExists('movie', 'idmovie', $jadwal->idmovie) ||
            !$this->foreignKeyExists('employee', 'idemployee', $jadwal->idemployee)
        ) {
            return false;
        }

        $sql = "INSERT INTO jadwal (tanggal, jam, idstudio, idmovie, idemployee) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $jadwal->tanggal,
            $jadwal->jam,
            $jadwal->idstudio,
            $jadwal->idmovie,
            $jadwal->idemployee,
        ]);
    }

    public function fetchAll(): array
    {
        $sql = "SELECT j.idjadwal, j.tanggal, j.jam, s.nama_studio, m.judul, e.employee_name
            FROM jadwal j
            LEFT JOIN studio s ON j.idstudio = s.idstudio
            LEFT JOIN movie m ON j.idmovie = m.idmovie
            LEFT JOIN employee e ON j.idemployee = e.idemployee";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchById(int $idjadwal): array
    {
        $sql = "SELECT j.idjadwal, s.idstudio, m.idmovie, e.idemployee, j.tanggal, j.jam, s.nama_studio, m.judul, e.employee_name
            FROM jadwal j
            LEFT JOIN studio s ON j.idstudio = s.idstudio
            LEFT JOIN movie m ON j.idmovie = m.idmovie
            LEFT JOIN employee e ON j.idemployee = e.idemployee
            WHERE j.idjadwal = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idjadwal]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(Jadwal $jadwal): bool
    {
        $sql = "UPDATE jadwal SET tanggal = ?, jam = ?, idstudio = ?, idmovie = ?, idemployee = ? WHERE idjadwal = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $jadwal->tanggal,
            $jadwal->jam,
            $jadwal->idstudio,
            $jadwal->idmovie,
            $jadwal->idemployee,
            $jadwal->idjadwal,
        ]);
    }

    public function delete(int $idjadwal): bool
    {
        $sql = "DELETE FROM jadwal WHERE idjadwal = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$idjadwal]);
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
