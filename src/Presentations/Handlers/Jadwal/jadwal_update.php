<?php
require_once '../../../init.php';

$data = [
    'idjadwal' => $_POST['idjadwal'],
    'tanggal' => $_POST['tanggal'],
    'jam' => $_POST['jam'],
    'idstudio' => $_POST['idstudio'],
    'idmovie' => $_POST['idmovie'],
    'idemployee' => $_POST['idemployee'],
];

if ($jadwalController->updateJadwal($data)) {
    header("Location: jadwal_list.php");
} else {
    echo "Gagal memperbarui jadwal.";
}
