<?php
require_once '../../../init.php';

$idemployee = $_GET['id'];
$employee = $employeeController->getEmployeeById($idemployee);

include '../../Views/Employee/employee_edit.php';
