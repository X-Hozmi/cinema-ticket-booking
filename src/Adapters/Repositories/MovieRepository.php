<?php

namespace Adapters\Repositories;

use Entities\Movie;
use Infrastructures\Databases\DatabaseConnection;
use PDO;

class MovieRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getConnection();
    }

    public function create(Movie $movie): bool
    {
        $sql = "INSERT INTO movie (judul, kategori) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $movie->judul,
            $movie->kategori,
        ]);
    }

    public function fetchAll(): array
    {
        $sql = "SELECT * FROM movie";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchById(int $idmovie): array
    {
        $sql = "SELECT * FROM movie WHERE idmovie = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idmovie]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(Movie $movie): bool
    {
        $sql = "UPDATE movie SET judul = ?, kategori = ? WHERE idmovie = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $movie->judul,
            $movie->kategori,
            $movie->idmovie,
        ]);
    }

    public function delete(int $idmovie): bool
    {
        $sql = "DELETE FROM movie WHERE idmovie = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$idmovie]);
    }
}
