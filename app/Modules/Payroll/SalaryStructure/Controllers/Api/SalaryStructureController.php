<?php

namespace Modules\Payroll\SalaryStructure\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Payroll\SalaryStructure\Facades\SalaryStructureFacade as SalaryStructure;
use Modules\Payroll\SalaryStructure\Resources\SalaryStructureResource;
use Modules\Payroll\SalaryStructure\Resources\SalaryStructureCollection;
use Modules\Payroll\SalaryStructure\Requests\SalaryStructureRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class SalaryStructureController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = SalaryStructure::getAll();
        return new SalaryStructureCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = SalaryStructure::getById($id);
        return  new SalaryStructureResource($data);
    }

    public function store(SalaryStructureRequest $request): SuccessResource
    {
        $data = SalaryStructure::store($request->validated());
       return  new SalaryStructureResource($data, $messages='SalaryStructure created successfully');
    }

    public function update(SalaryStructureRequest $request, int $id): SuccessResource
    {
        $data = SalaryStructure::update($request->validated(), $id);
        return  new SalaryStructureResource($data, $messages='SalaryStructure updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=SalaryStructure::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'SalaryStructure deleted successfully':'SalaryStructure not found',
        ]);
    }
}
