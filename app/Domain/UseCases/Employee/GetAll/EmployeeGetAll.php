<?php

namespace App\Domain\UseCases\Employee\GetAll;

use App\Domain\Services\Employee\EmployeeService;

class EmployeeGetAll
{
    private EmployeeService $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function execute(int $page, int $limit, string|null $search): array
    {
        return $this->employeeService->getAll($page, $limit, $search);
    }
}
