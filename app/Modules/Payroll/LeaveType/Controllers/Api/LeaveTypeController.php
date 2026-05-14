<?php

namespace Modules\Payroll\LeaveType\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Payroll\LeaveType\Facades\LeaveTypeFacade as LeaveType;
use Modules\Payroll\LeaveType\Resources\LeaveTypeResource;
use Modules\Payroll\LeaveType\Resources\LeaveTypeCollection;
use Modules\Payroll\LeaveType\Requests\LeaveTypeRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class LeaveTypeController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = LeaveType::getAll();
        return new LeaveTypeCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = LeaveType::getById($id);
        return  new LeaveTypeResource($data);
    }

    public function store(LeaveTypeRequest $request): SuccessResource
    {
        $data = LeaveType::store($request->validated());
       return  new LeaveTypeResource($data, $messages='LeaveType created successfully');
    }

    public function update(LeaveTypeRequest $request, int $id): SuccessResource
    {
        $data = LeaveType::update($request->validated(), $id);
        return  new LeaveTypeResource($data, $messages='LeaveType updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=LeaveType::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'LeaveType deleted successfully':'LeaveType not found',
        ]);
    }
}
