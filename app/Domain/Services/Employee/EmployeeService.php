<?php

namespace App\Domain\Services\Employee;

use App\Domain\Entities\Employee\Employee;
use App\Domain\Repositories\Employee\EmployeeInterface;

class EmployeeService
{
    private $employeeRepository;

    public function __construct(EmployeeInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function create(array $params): Employee
    {
        return $this->employeeRepository->create($params);
    }
    public function getById(int $id): Employee
    {
        return $this->employeeRepository->getById($id);
    }

    public function update(int $id, array $params): Employee
    {
        return $this->employeeRepository->update($id, $params);
    }

    public function delete(int $id): void
    {
        $this->employeeRepository->delete($id);
    }

    public function getAll(int $page, int $limit, string|null $search): array
    {
        return $this->employeeRepository->getAll($page, $limit, $search);
    }
}
