<?php
require_once '../../../init.php';

$data = [
    'idseat' => $_POST['idseat'],
    'nama_seat' => $_POST['nama_seat'],
];

if ($seatController->updateSeat($data)) {
    header("Location: seat_list.php");
} else {
    echo "Gagal memperbarui seat.";
}
