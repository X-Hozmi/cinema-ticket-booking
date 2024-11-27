<?php

namespace UseCases;

use Adapters\Repositories\SeatRepository;
use Entities\Seat;

class ManageSeat
{
    private SeatRepository $repository;

    public function __construct(SeatRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Seat $seat): bool
    {
        return $this->repository->create($seat);
    }

    public function fetchAll(): array
    {
        return $this->repository->fetchAll();
    }

    public function fetchById(int $idseat): array
    {
        return $this->repository->fetchById($idseat);
    }

    public function update(Seat $seat): bool
    {
        return $this->repository->update($seat);
    }

    public function delete(int $idseat): bool
    {
        return $this->repository->delete($idseat);
    }
}
