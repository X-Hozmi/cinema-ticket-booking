<?php
require_once '../../../init.php';

$jadwalList = $jadwalController->getAllJadwal();
$studioList = $studioController->getAllStudios();
$priceList = $priceController->getAllPrices();

include '../../Views/Ticket/ticket_create.php';
