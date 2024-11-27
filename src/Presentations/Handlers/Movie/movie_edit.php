<?php
require_once '../../../init.php';

$idmovie = $_GET['id'];
$movie = $movieController->getMovieById($idmovie);

include '../../Views/Movie/movie_edit.php';
