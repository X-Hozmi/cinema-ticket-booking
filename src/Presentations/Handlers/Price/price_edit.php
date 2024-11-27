<?php
require_once '../../../init.php';

$idprice = $_GET['id'];
$price = $priceController->getPriceById($idprice);

include '../../Views/Price/price_edit.php';
