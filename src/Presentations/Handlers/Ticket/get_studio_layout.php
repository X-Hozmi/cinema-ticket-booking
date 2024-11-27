<?php
require_once '../../../init.php';

$idstudio = $_GET['studio_id'];
echo json_encode($studioController->getStudioById($idstudio));
