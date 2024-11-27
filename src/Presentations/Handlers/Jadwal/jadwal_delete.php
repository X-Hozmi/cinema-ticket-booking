<?php
require_once '../../../init.php';

$idjadwal = $_GET['id'];

if ($jadwalController->deleteJadwal($idjadwal)) {
    header("Location: jadwal_list.php");
} else {
    echo "Gagal menghapus jadwal.";
}
