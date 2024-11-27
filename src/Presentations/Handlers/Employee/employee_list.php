<?php
require_once '../../../init.php';

$employeeList = $employeeController->getAllEmployees();

include '../../Views/Employee/employee_list.php';
