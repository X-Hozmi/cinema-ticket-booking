<?php
require_once '../../../init.php';

$idstudio = $_GET['id'];

if ($studioController->deleteStudio($idstudio)) {
    header("Location: studio_list.php");
} else {
    echo "Gagal menghapus studio.";
}
