<?php

namespace Adapters\Repositories;

use Entities\Seat;
use Infrastructures\Databases\DatabaseConnection;
use PDO;

class SeatRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getConnection();
    }

    public function create(Seat $seat): bool
    {
        $sql = "INSERT INTO seat (nama_seat) VALUES (?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $seat->nama_seat,
        ]);
    }

    public function fetchAll(): array
    {
        $sql = "SELECT * FROM seat";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchById(int $idseat): array
    {
        $sql = "SELECT * FROM seat WHERE idseat = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idseat]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(Seat $seat): bool
    {
        $sql = "UPDATE seat SET nama_seat = ? WHERE idseat = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $seat->nama_seat,
            $seat->idseat,
        ]);
    }

    public function delete(int $idseat): bool
    {
        $sql = "DELETE FROM seat WHERE idseat = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$idseat]);
    }
}
