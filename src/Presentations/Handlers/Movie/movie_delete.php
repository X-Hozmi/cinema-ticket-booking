<?php
require_once '../../../init.php';

$idmovie = $_GET['id'];

if ($movieController->deleteMovie($idmovie)) {
    header("Location: movie_list.php");
} else {
    echo "Gagal menghapus movie.";
}
