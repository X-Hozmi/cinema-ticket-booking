<?php

namespace Adapters\Controllers;

use UseCases\ManageEmployee;
use Entities\Employee;

class EmployeeController
{
    private ManageEmployee $employeeManager;

    public function __construct(ManageEmployee $employeeManager)
    {
        $this->employeeManager = $employeeManager;
    }

    public function createEmployee(array $data): bool
    {
        $employee = new Employee();
        $employee->employee_name = $data['employee_name'];
        return $this->employeeManager->create($employee);
    }

    public function getAllEmployees(): array
    {
        return $this->employeeManager->fetchAll();
    }

    public function getEmployeeById(int $idemployee): array
    {
        return $this->employeeManager->fetchById($idemployee);
    }

    public function updateEmployee(array $data): bool
    {
        $employee = new Employee();
        $employee->idemployee = $data['idemployee'];
        $employee->employee_name = $data['employee_name'];
        return $this->employeeManager->update($employee);
    }

    public function deleteEmployee(int $idemployee): bool
    {
        return $this->employeeManager->delete($idemployee);
    }
}
