<?php
require_once '../../../init.php';

$idjadwal = $_GET['id'];
$jadwal = $jadwalController->getJadwalById($idjadwal);

$studioList = $studioController->getAllStudios();
$movieList = $movieController->getAllMovies();
$employeeList = $employeeController->getAllEmployees();

include '../../Views/Jadwal/jadwal_edit.php';
