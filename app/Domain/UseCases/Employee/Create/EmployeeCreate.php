<?php

namespace App\Domain\UseCases\Employee\Create;

use App\Domain\Entities\Employee\Employee;
use App\Domain\Services\Employee\EmployeeService;

class EmployeeCreate
{
    private $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function execute(array $params): Employee
    {
        return $this->employeeService->create($params);
    }
}
