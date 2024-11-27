<?php
require_once '../../../init.php';

$data = [
    'idemployee' => $_POST['idemployee'],
    'employee_name' => $_POST['employee_name'],
];

if ($employeeController->updateEmployee($data)) {
    header("Location: employee_list.php");
} else {
    echo "Gagal memperbarui employee.";
}
