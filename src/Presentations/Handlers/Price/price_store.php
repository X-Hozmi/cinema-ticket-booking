<?php
require_once '../../../init.php';

$data = [
    'kategori' => $_POST['kategori'],
    'total_price' => $_POST['total_price'],
];

if ($priceController->createPrice($data)) {
    header("Location: price_list.php");
} else {
    echo "Gagal menambahkan price.";
}
