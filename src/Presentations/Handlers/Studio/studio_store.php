<?php
require_once '../../../init.php';

$data = [
    'nama_studio' => $_POST['nama_studio'],
    'jumlah_kursi_baris' => $_POST['jumlah_kursi_baris'],
    'jumlah_kursi_kolom' => $_POST['jumlah_kursi_kolom'],
];

if ($studioController->createStudio($data)) {
    header("Location: studio_list.php");
} else {
    echo "Gagal menambahkan studio.";
}
