<?php
require_once '../../../init.php';

$idstudio = $_GET['id'];
$studio = $studioController->getStudioById($idstudio);

include '../../Views/Studio/studio_edit.php';
