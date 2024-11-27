<?php
require_once '../../../init.php';

$studioList = $studioController->getAllStudios();
$movieList = $movieController->getAllMovies();
$employeeList = $employeeController->getAllEmployees();

include '../../Views/Jadwal/jadwal_create.php';
