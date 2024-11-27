<?php
require_once '../../../init.php';

$data = [
    'employee_name' => $_POST['employee_name'],
];

if ($employeeController->createEmployee($data)) {
    header("Location: employee_list.php");
} else {
    echo "Gagal menambahkan employee.";
}
