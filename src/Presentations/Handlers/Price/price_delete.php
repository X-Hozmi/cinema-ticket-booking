<?php
require_once '../../../init.php';

$idprice = $_GET['id'];

if ($priceController->deletePrice($idprice)) {
    header("Location: price_list.php");
} else {
    echo "Gagal menghapus price.";
}
