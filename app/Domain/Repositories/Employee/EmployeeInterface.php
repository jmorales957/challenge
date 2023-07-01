<?php

namespace App\Domain\Repositories\Employee;

use App\Domain\Entities\Employee\Employee;

interface EmployeeInterface
{
    public function create(array $params): Employee;

    public function getById(int $id): Employee;

    public function update(int $id, array $params): Employee;

    public function delete(int $id): void;

    public function getAll(int $page, int $limit, string|null $search): array;
}
