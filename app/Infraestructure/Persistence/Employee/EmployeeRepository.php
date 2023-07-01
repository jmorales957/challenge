<?php

namespace App\Infraestructure\Persistence\Employee;

use App\Domain\Repositories\Employee\EmployeeInterface;
use App\Infraestructure\Persistence\Employee\Employee as EmployeeModel;
use App\Domain\Entities\Employee\Employee;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EmployeeRepository implements EmployeeInterface
{
    public function create($params): Employee
    {
        $employeeCreated  = EmployeeModel::create($params);
        $instanceEmployee = new Employee($employeeCreated->name, $employeeCreated->email, $employeeCreated->position, $employeeCreated->dateBirth, $employeeCreated->address, $employeeCreated->skills);
        $instanceEmployee->setId($employeeCreated->id);

        return $instanceEmployee;
    }

    public function getById(int $id): Employee
    {
        $employeeFound = EmployeeModel::find($id);

        if(is_null($employeeFound)) {
            throw new NotFoundHttpException('Employee not found');
        }
        $instanceEmployee = new Employee($employeeFound->name, $employeeFound->email, $employeeFound->position, $employeeFound->dateBirth, $employeeFound->address, $employeeFound->skills);
        $instanceEmployee->setId($employeeFound->id);

        return $instanceEmployee;
    }

    public function update(int $id, array $params): Employee
    {
        $employeeFound = EmployeeModel::find($id);
        if(is_null($employeeFound)) {
            throw new NotFoundHttpException('Employee not found');
        }
        $employeeFound->name      = $params['name'];
        $employeeFound->email     = $params['email'];
        $employeeFound->position  = $params['position'];
        $employeeFound->dateBirth = $params['dateBirth'];
        $employeeFound->address   = $params['address'];
        $employeeFound->skills    = $params['skills'];
        $employeeFound->save();
        $instanceEmployee =  new Employee($employeeFound->name, $employeeFound->email, $employeeFound->position, $employeeFound->dateBirth, $employeeFound->address, $employeeFound->skills);
        $instanceEmployee->setId($employeeFound->id);

        return $instanceEmployee;
    }

    public function delete(int $id): void
    {
        $employeeFound = EmployeeModel::find($id);
        if(is_null($employeeFound)) {
            throw new NotFoundHttpException('Employee not found');
        }
        $employeeFound->delete();

    }

    public function getAll($page, $limit, $search): array
    {
        // Calcular el offset para la paginación
        $query = EmployeeModel::query();

        // Aplicar la búsqueda solo si se proporciona un valor para "search"
        if (!is_null($search)) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        }

        // Calcular el offset para la paginación
        $offset = ($page - 1) * $limit;

        // Obtener la cantidad total de registros
        $total = $query->count();

        // Obtener los registros paginados
        $results = $query->offset($offset)
            ->limit($limit)
            ->get();

        // Calcular el número total de páginas
        $pages = ceil($total / $limit);

        return [
            'pages'   => $pages,
            'page'    => $page,
            'limit'   => $limit,
            'total'   => $total,
            'results' => $results,
        ];
    }
}
