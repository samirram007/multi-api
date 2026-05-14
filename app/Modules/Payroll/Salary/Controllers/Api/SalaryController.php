<?php

namespace Modules\Payroll\Salary\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Payroll\Salary\Contracts\SalaryServiceInterface;
use Modules\Payroll\Salary\Resources\SalaryResource;
use Modules\Payroll\Salary\Resources\SalaryCollection;
use Modules\Payroll\Salary\Requests\SalaryRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use Modules\Payroll\Salary\Facades\SalaryFacade;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class SalaryController extends Controller
{
    use ApiResponseTrait;

    public function index(): SuccessCollection
    {
        $data = SalaryFacade::getAll();
        return new SalaryCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = SalaryFacade::getById($id);
        return  new SalaryResource($data);
    }

    public function store(SalaryRequest $request): SuccessResource
    {
        $data = SalaryFacade::store($request->validated());
       return  new SalaryResource($data, $messages='Salary created successfully');
    }

    public function update(SalaryRequest $request, int $id): SuccessResource
    {
        $data = SalaryFacade::update($request->validated(), $id);
        return  new SalaryResource($data, $messages='Salary updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=SalaryFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Salary deleted successfully':'Salary not found',
        ]);
    }
}
