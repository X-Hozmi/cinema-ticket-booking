<?php
require_once '../../../init.php';

$idemployee = $_GET['id'];

if ($employeeController->deleteEmployee($idemployee)) {
    header("Location: employee_list.php");
} else {
    echo "Gagal menghapus employee.";
}
