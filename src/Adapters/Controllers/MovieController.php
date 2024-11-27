<?php

namespace Adapters\Controllers;

use UseCases\ManageMovie;
use Entities\Movie;

class MovieController
{
    private ManageMovie $movieManager;

    public function __construct(ManageMovie $movieManager)
    {
        $this->movieManager = $movieManager;
    }

    public function createMovie(array $data): bool
    {
        $movie = new Movie();
        $movie->judul = $data['judul'];
        $movie->kategori = $data['kategori'];
        return $this->movieManager->create($movie);
    }

    public function getAllMovies(): array
    {
        return $this->movieManager->fetchAll();
    }

    public function getMovieById(int $idmovie): array
    {
        return $this->movieManager->fetchById($idmovie);
    }

    public function updateMovie(array $data): bool
    {
        $movie = new Movie();
        $movie->idmovie = $data['idmovie'];
        $movie->judul = $data['judul'];
        $movie->kategori = $data['kategori'];
        return $this->movieManager->update($movie);
    }

    public function deleteMovie(int $idmovie): bool
    {
        return $this->movieManager->delete($idmovie);
    }
}
