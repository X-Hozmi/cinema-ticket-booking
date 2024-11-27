<?php
require_once '../../../init.php';

$studioList = $studioController->getAllStudios();

include '../../Views/Studio/studio_list.php';
