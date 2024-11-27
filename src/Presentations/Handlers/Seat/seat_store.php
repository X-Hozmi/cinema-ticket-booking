<?php
require_once '../../../init.php';

$data = [
    'nama_seat' => $_POST['nama_seat'],
];

if ($seatController->createSeat($data)) {
    header("Location: seat_list.php");
} else {
    echo "Gagal menambahkan seat.";
}
