<?php
require_once '../../../init.php';

$priceList = $priceController->getAllPrices();

include '../../Views/Price/price_list.php';
