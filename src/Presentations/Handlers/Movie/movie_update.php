<?php
require_once '../../../init.php';

$data = [
    'idmovie' => $_POST['idmovie'],
    'judul' => $_POST['judul'],
    'kategori' => $_POST['kategori'],
];

if ($movieController->updateMovie($data)) {
    header("Location: movie_list.php");
} else {
    echo "Gagal memperbarui movie.";
}
