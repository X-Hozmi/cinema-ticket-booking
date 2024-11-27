<?php

namespace Adapters\Repositories;

use Entities\Price;
use Infrastructures\Databases\DatabaseConnection;
use PDO;

class PriceRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getConnection();
    }

    public function create(Price $price): bool
    {
        $sql = "INSERT INTO price (kategori, total_price) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $price->kategori,
            $price->total_price,
        ]);
    }

    public function fetchAll(): array
    {
        $sql = "SELECT * FROM price";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchById(int $idprice): array
    {
        $sql = "SELECT * FROM price WHERE idprice = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idprice]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(Price $price): bool
    {
        $sql = "UPDATE price SET kategori = ?, total_price = ? WHERE idprice = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $price->kategori,
            $price->total_price,
            $price->idprice,
        ]);
    }

    public function delete(int $idprice): bool
    {
        $sql = "DELETE FROM price WHERE idprice = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$idprice]);
    }
}
