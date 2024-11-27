<?php
require_once '../../../init.php';

$idjadwal = $_GET['jadwal_id'];
echo json_encode($ticketController->getBookedSeatsByJadwalId($idjadwal));
