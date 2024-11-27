<?php

namespace Adapters\Repositories;

use Entities\Employee;
use Infrastructures\Databases\DatabaseConnection;
use PDO;

class EmployeeRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getConnection();
    }

    public function create(Employee $employee): bool
    {
        $sql = "INSERT INTO employee (employee_name) VALUES (?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $employee->employee_name,
        ]);
    }

    public function fetchAll(): array
    {
        $sql = "SELECT * FROM employee";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchById(int $idemployee): array
    {
        $sql = "SELECT * FROM employee WHERE idemployee = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idemployee]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(Employee $employee): bool
    {
        $sql = "UPDATE employee SET employee_name = ? WHERE idemployee = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $employee->employee_name,
            $employee->idemployee,
        ]);
    }

    public function delete(int $idemployee): bool
    {
        $sql = "DELETE FROM employee WHERE idemployee = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$idemployee]);
    }
}
