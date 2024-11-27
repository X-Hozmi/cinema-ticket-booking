<?php
require_once '../../../init.php';

$jadwalList = $jadwalController->getAllJadwal();

include '../../Views/Jadwal/jadwal_list.php';
