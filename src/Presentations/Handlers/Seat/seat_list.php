<?php
require_once '../../../init.php';

$seatList = $seatController->getAllSeats();

include '../../Views/Seat/seat_list.php';
