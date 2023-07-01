<?php

namespace App\Domain\UseCases\Employee\Delete;

use App\Domain\Services\Employee\EmployeeService;

class EmployeeDelete
{
    private $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function execute(int $id): void
    {
        $this->employeeService->delete($id);
    }
}
