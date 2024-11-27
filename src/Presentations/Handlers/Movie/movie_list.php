<?php
require_once '../../../init.php';

$movieList = $movieController->getAllMovies();

include '../../Views/Movie/movie_list.php';
