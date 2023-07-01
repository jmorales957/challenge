<?php

namespace App\Domain\UseCases\Employee\Update;

use App\Domain\Entities\Employee\Employee;
use App\Domain\Services\Employee\EmployeeService;

class EmployeeUpdate
{
    private $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function execute(int $id, $params): Employee
    {
        return $this->employeeService->update($id, $params);
    }
}
