<?php
require_once '../../../init.php';

$data = [
    'idstudio' => $_POST['idstudio'],
    'nama_studio' => $_POST['nama_studio'],
    'jumlah_kursi_baris' => $_POST['jumlah_kursi_baris'],
    'jumlah_kursi_kolom' => $_POST['jumlah_kursi_kolom'],
];

if ($studioController->updateStudio($data)) {
    header("Location: studio_list.php");
} else {
    echo "Gagal memperbarui studio.";
}
