<?php

namespace App\Domain\UseCases\Employee\GetById;

use App\Domain\Entities\Employee\Employee;
use App\Domain\Services\Employee\EmployeeService;

class EmployeeGetById
{
    private $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function execute(int $id): Employee
    {
        return $this->employeeService->getById($id);
    }
}
