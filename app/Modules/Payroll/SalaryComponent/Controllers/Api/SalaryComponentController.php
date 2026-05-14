<?php

namespace Modules\Payroll\SalaryComponent\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Payroll\SalaryComponent\Facades\SalaryComponentFacade as SalaryComponent;
use Modules\Payroll\SalaryComponent\Resources\SalaryComponentResource;
use Modules\Payroll\SalaryComponent\Resources\SalaryComponentCollection;
use Modules\Payroll\SalaryComponent\Requests\SalaryComponentRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class SalaryComponentController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = SalaryComponent::getAll();
        return new SalaryComponentCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = SalaryComponent::getById($id);
        return  new SalaryComponentResource($data);
    }

    public function store(SalaryComponentRequest $request): SuccessResource
    {
        $data = SalaryComponent::store($request->validated());
       return  new SalaryComponentResource($data, $messages='SalaryComponent created successfully');
    }

    public function update(SalaryComponentRequest $request, int $id): SuccessResource
    {
        $data = SalaryComponent::update($request->validated(), $id);
        return  new SalaryComponentResource($data, $messages='SalaryComponent updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=SalaryComponent::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'SalaryComponent deleted successfully':'SalaryComponent not found',
        ]);
    }
}
