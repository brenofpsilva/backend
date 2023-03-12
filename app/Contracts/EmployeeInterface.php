<?php

namespace App\Contracts;

interface EmployeeInterface
{
    /**
     * get all data
     *
     * @return array all data
     */
    public function getAllEmployees();

    /**
     * find item by id
     *
     * @param int $id
     * @return object item
     */
    public function findEmployee(int $id);

    /**
     * Create new item
     *
     * @param array $employeeDetails
     * @return object created item
     */
    public function createEmployees(array $employeeDetails);

    /**
     * Update item
     *
     * @param int $id
     * @param array $employeeDetails
     * @return object updated item
     */
    public function updateEmployees($id, array $employeeDetails);
}
