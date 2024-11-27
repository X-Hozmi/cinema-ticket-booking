<?php

namespace UseCases;

use Adapters\Repositories\PriceRepository;
use Entities\Price;

class ManagePrice
{
    private PriceRepository $repository;

    public function __construct(PriceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Price $price): bool
    {
        return $this->repository->create($price);
    }

    public function fetchAll(): array
    {
        return $this->repository->fetchAll();
    }

    public function fetchById(int $idprice): array
    {
        return $this->repository->fetchById($idprice);
    }

    public function update(Price $price): bool
    {
        return $this->repository->update($price);
    }

    public function delete(int $idprice): bool
    {
        return $this->repository->delete($idprice);
    }
}
