<?php

namespace UseCases;

use Adapters\Repositories\JadwalRepository;
use Entities\Jadwal;

class ManageJadwal
{
    private JadwalRepository $repository;

    public function __construct(JadwalRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Jadwal $jadwal): bool
    {
        return $this->repository->create($jadwal);
    }

    public function fetchAll(): array
    {
        return $this->repository->fetchAll();
    }

    public function fetchById(int $idjadwal): array
    {
        return $this->repository->fetchById($idjadwal);
    }

    public function update(Jadwal $jadwal): bool
    {
        return $this->repository->update($jadwal);
    }

    public function delete(int $idjadwal): bool
    {
        return $this->repository->delete($idjadwal);
    }
}
