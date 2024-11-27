<?php
require_once '../../../init.php';

$idseat = $_GET['id'];

if ($seatController->deleteSeat($idseat)) {
    header("Location: seat_list.php");
} else {
    echo "Gagal menghapus seat.";
}
