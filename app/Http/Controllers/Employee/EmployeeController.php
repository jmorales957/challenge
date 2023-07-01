<?php

namespace App\Http\Controllers\Employee;

use App\Domain\UseCases\Employee\Create\EmployeeCreate;
use App\Domain\UseCases\Employee\Delete\EmployeeDelete;
use App\Domain\UseCases\Employee\GetAll\EmployeeGetAll;
use App\Domain\UseCases\Employee\GetById\EmployeeGetById;
use App\Domain\UseCases\Employee\Update\EmployeeUpdate;
use App\Http\Controllers\Controller;
use App\Http\Request\Employee\CreateEmployeeRequest;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EmployeeController extends Controller
{
    private EmployeeCreate $employeeCreate;
    private EmployeeGetById $employeeGetByid;
    private EmployeeUpdate $employeeUpdate;
    private EmployeeDelete $employeeDelete;
    private EmployeeGetAll $employeeGetAll;

    public function __construct(EmployeeCreate $employeeCreate, EmployeeGetById $employeeGetById, EmployeeUpdate $employeeUpdate, EmployeeDelete $employeeDelete, EmployeeGetAll $employeeGetAll)
    {
        $this->employeeCreate  = $employeeCreate;
        $this->employeeGetByid = $employeeGetById;
        $this->employeeUpdate  = $employeeUpdate;
        $this->employeeDelete  = $employeeDelete;
        $this->employeeGetAll  = $employeeGetAll;
    }

    public function create(CreateEmployeeRequest $request)
    {
        try {
            $user = $this->employeeCreate->execute($request->all());

            return response()->json($user->toArray());
        } catch (\Exception $exception) {
            return response()->json($exception, 500);
        }
    }
    public function getById(int $id)
    {
        try {
            $user = $this->employeeGetByid->execute($id);

            return response()->json($user->toArray());
        } catch (NotFoundHttpException $exception) {
            return response()->json($exception->getMessage(), 404);
        }
    }
    public function update(int $id, CreateEmployeeRequest $request)
    {
        try {
            $user = $this->employeeUpdate->execute($id, $request->all());

            return response()->json($user->toArray());
        } catch (NotFoundHttpException $exception) {
            return response()->json($exception->getMessage(), 404);
        }
    }
    public function delete(int $id)
    {
        try {
            $this->employeeDelete->execute($id);

            return response()->json();
        } catch (NotFoundHttpException $exception) {
            return response()->json($exception->getMessage(), 404);
        }
    }

    public function getAll(\Illuminate\Http\Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'page'   => 'required|integer|min:1',
                'limit'  => 'required|integer|min:1',
                'search' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),
                ], 400);
            }

            return response()->json($this->employeeGetAll->execute($request->page, $request->limit, $request->search ?? null));
        } catch (\Exception $exception) {
            return response()->json($exception, 500);
        }
    }
}
