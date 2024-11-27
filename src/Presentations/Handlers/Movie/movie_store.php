<?php
require_once '../../../init.php';

$data = [
    'judul' => $_POST['judul'],
    'kategori' => $_POST['kategori'],
];

if ($movieController->createMovie($data)) {
    header("Location: movie_list.php");
} else {
    echo "Gagal menambahkan movie.";
}
