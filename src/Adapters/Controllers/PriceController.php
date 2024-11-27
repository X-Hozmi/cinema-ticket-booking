<?php

namespace Adapters\Controllers;

use UseCases\ManagePrice;
use Entities\Price;

class PriceController
{
    private ManagePrice $priceManager;

    public function __construct(ManagePrice $priceManager)
    {
        $this->priceManager = $priceManager;
    }

    public function createPrice(array $data): bool
    {
        $price = new Price();
        $price->kategori = $data['kategori'];
        $price->total_price = $data['total_price'];
        return $this->priceManager->create($price);
    }

    public function getAllPrices(): array
    {
        return $this->priceManager->fetchAll();
    }

    public function getPriceById(int $idprice): array
    {
        return $this->priceManager->fetchById($idprice);
    }

    public function updatePrice(array $data): bool
    {
        $price = new Price();
        $price->idprice = $data['idprice'];
        $price->kategori = $data['kategori'];
        $price->total_price = $data['total_price'];
        return $this->priceManager->update($price);
    }

    public function deletePrice(int $idprice): bool
    {
        return $this->priceManager->delete($idprice);
    }
}
