<?php

namespace UseCases;

use Adapters\Repositories\StudioRepository;
use Entities\Studio;

class ManageStudio
{
    private StudioRepository $repository;

    public function __construct(StudioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Studio $studio): bool
    {
        return $this->repository->create($studio);
    }

    public function fetchAll(): array
    {
        return $this->repository->fetchAll();
    }

    public function fetchById(int $idstudio): array
    {
        return $this->repository->fetchById($idstudio);
    }

    public function update(Studio $studio): bool
    {
        return $this->repository->update($studio);
    }

    public function delete(int $idstudio): bool
    {
        return $this->repository->delete($idstudio);
    }
}
