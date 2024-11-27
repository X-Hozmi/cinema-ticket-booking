<?php

namespace UseCases;

use Adapters\Repositories\MovieRepository;
use Entities\Movie;

class ManageMovie
{
    private MovieRepository $repository;

    public function __construct(MovieRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Movie $movie): bool
    {
        return $this->repository->create($movie);
    }

    public function fetchAll(): array
    {
        return $this->repository->fetchAll();
    }

    public function fetchById(int $idmovie): array
    {
        return $this->repository->fetchById($idmovie);
    }

    public function update(Movie $movie): bool
    {
        return $this->repository->update($movie);
    }

    public function delete(int $idmovie): bool
    {
        return $this->repository->delete($idmovie);
    }
}
