<?php
require_once '../../../init.php';

$idseat = $_GET['id'];
$seat = $seatController->getSeatById($idseat);

include '../../Views/Seat/seat_edit.php';
