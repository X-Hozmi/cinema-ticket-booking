<?php

namespace UseCases;

use Adapters\Repositories\EmployeeRepository;
use Entities\Employee;

class ManageEmployee
{
    private EmployeeRepository $repository;

    public function __construct(EmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Employee $employee): bool
    {
        return $this->repository->create($employee);
    }

    public function fetchAll(): array
    {
        return $this->repository->fetchAll();
    }

    public function fetchById(int $idemployee): array
    {
        return $this->repository->fetchById($idemployee);
    }

    public function update(Employee $employee): bool
    {
        return $this->repository->update($employee);
    }

    public function delete(int $idemployee): bool
    {
        return $this->repository->delete($idemployee);
    }
}
