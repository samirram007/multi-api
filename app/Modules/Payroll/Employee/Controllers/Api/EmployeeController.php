<?php

namespace App\Modules\Payroll\Employee\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\Payroll\Employee\Resources\EmployeeResource;
use App\Modules\Payroll\Employee\Resources\EmployeeCollection;
use App\Modules\Payroll\Employee\Requests\EmployeeRequest;
use App\Modules\Payroll\Employee\Facades\EmployeeFacade as Employee;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Employee::getAll();
        return new EmployeeCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Employee::getById($id);
        return  new EmployeeResource($data);
    }

    public function store(EmployeeRequest $request): SuccessResource
    {
        $data = Employee::store($request->validated());
       return  new EmployeeResource($data, $messages='Employee created successfully');
    }

    public function update(EmployeeRequest $request, int $id): SuccessResource
    {
        $data = Employee::update($request->validated(), $id);
        return  new EmployeeResource($data, $messages='Employee updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Employee::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Employee deleted successfully':'Employee not found',
        ]);
    }
}
