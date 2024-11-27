<?php
require_once '../../../init.php';

$data = [
    'idprice' => $_POST['idprice'],
    'kategori' => $_POST['kategori'],
    'total_price' => $_POST['total_price'],
];

if ($priceController->updatePrice($data)) {
    header("Location: price_list.php");
} else {
    echo "Gagal memperbarui price.";
}
