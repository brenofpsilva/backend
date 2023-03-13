<?php

namespace App\Repositories;

use App\Contracts\EmployeeInterface;
use App\Models\Employee;

class EmployeeRepository implements EmployeeInterface
{
    /**
     * get all data
     *
     * @return array all data
     */
    public function getAllEmployees()
    {
        return Employee::orderBy('name', 'asc')->get();
    }

    public function findEmployee(int $id)
    {
        return Employee::find($id);
    }

    /**
     * Create new item
     *
     * @param array $employeeDetails
     * @return object created item
     */
    public function createEmployees(array $employeeDetails): Employee
    {
        return Employee::create($employeeDetails);
    }

    /**
     * Update item
     *
     * @param int $id
     * @param array $employeeDetails
     * @return object updated item
     */
    public function updateEmployees($id, array $employeeDetails): Employee
    {
        $employee = Employee::find($id);
        $employee->update($employeeDetails);
        return $employee;
    }
}
