<?php

namespace App\Modules\Payroll\Department\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\Payroll\Department\Resources\DepartmentResource;
use App\Modules\Payroll\Department\Resources\DepartmentCollection;
use App\Modules\Payroll\Department\Requests\DepartmentRequest;
use App\Modules\Payroll\Department\Facades\DepartmentFacade as Department;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class DepartmentController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Department::getAll();
        return new DepartmentCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Department::getById($id);
        return  new DepartmentResource($data);
    }

    public function store(DepartmentRequest $request): SuccessResource
    {
        $data = Department::store($request->validated());
       return  new DepartmentResource($data, $messages='Department created successfully');
    }

    public function update(DepartmentRequest $request, int $id): SuccessResource
    {
        $data = Department::update($request->validated(), $id);
        return  new DepartmentResource($data, $messages='Department updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Department::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Department deleted successfully':'Department not found',
        ]);
    }
}
