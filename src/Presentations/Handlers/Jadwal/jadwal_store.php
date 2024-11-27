<?php
require_once '../../../init.php';

$data = [
    'tanggal' => $_POST['tanggal'],
    'jam' => $_POST['jam'],
    'idstudio' => $_POST['idstudio'],
    'idmovie' => $_POST['idmovie'],
    'idemployee' => $_POST['idemployee'],
];

if ($jadwalController->createJadwal($data)) {
    header("Location: jadwal_list.php");
} else {
    echo "Gagal menambahkan jadwal.";
}
