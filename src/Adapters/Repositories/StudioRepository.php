<?php

namespace Adapters\Repositories;

use Entities\Studio;
use Infrastructures\Databases\DatabaseConnection;
use PDO;

class StudioRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getConnection();
    }

    public function create(Studio $studio): bool
    {
        $sql = "INSERT INTO studio (nama_studio) VALUES (?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $studio->nama_studio,
        ]);
    }

    public function fetchAll(): array
    {
        $sql = "SELECT * FROM studio";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchById(int $idstudio): array
    {
        $sql = "SELECT * FROM studio WHERE idstudio = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idstudio]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(Studio $studio): bool
    {
        $sql = "UPDATE studio SET nama_studio = ?, jumlah_kursi_baris = ?, jumlah_kursi_kolom = ? WHERE idstudio = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $studio->nama_studio,
            $studio->jumlah_kursi_baris,
            $studio->jumlah_kursi_kolom,
            $studio->idstudio,
        ]);
    }

    public function delete(int $idstudio): bool
    {
        $sql = "DELETE FROM studio WHERE idstudio = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$idstudio]);
    }
}
