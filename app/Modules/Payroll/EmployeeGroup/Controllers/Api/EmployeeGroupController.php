<?php

namespace Modules\Payroll\EmployeeGroup\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\Payroll\EmployeeGroup\Resources\EmployeeGroupResource;
use Modules\Payroll\EmployeeGroup\Resources\EmployeeGroupCollection;
use Modules\Payroll\EmployeeGroup\Requests\EmployeeGroupRequest;
use Modules\Payroll\EmployeeGroup\Facades\EmployeeGroupFacade as EmployeeGroup;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class EmployeeGroupController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = EmployeeGroup::getAll();
        return new EmployeeGroupCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = EmployeeGroup::getById($id);
        return  new EmployeeGroupResource($data);
    }

    public function store(EmployeeGroupRequest $request): SuccessResource
    {
        $data = EmployeeGroup::store($request->validated());
       return  new EmployeeGroupResource($data, $messages='EmployeeGroup created successfully');
    }

    public function update(EmployeeGroupRequest $request, int $id): SuccessResource
    {
        $data = EmployeeGroup::update($request->validated(), $id);
        return  new EmployeeGroupResource($data, $messages='EmployeeGroup updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=EmployeeGroup::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'EmployeeGroup deleted successfully':'EmployeeGroup not found',
        ]);
    }
}
