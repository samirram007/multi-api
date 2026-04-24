<?php

namespace App\Modules\Payroll\Designation\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\Payroll\Designation\Resources\DesignationResource;
use App\Modules\Payroll\Designation\Resources\DesignationCollection;
use App\Modules\Payroll\Designation\Requests\DesignationRequest;
use App\Modules\Payroll\Designation\Facades\DesignationFacade as Designation;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class DesignationController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Designation::getAll();
        return new DesignationCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Designation::getById($id);
        return  new DesignationResource($data);
    }

    public function store(DesignationRequest $request): SuccessResource
    {
        $data = Designation::store($request->validated());
       return  new DesignationResource($data, $messages='Designation created successfully');
    }

    public function update(DesignationRequest $request, int $id): SuccessResource
    {
        $data = Designation::update($request->validated(), $id);
        return  new DesignationResource($data, $messages='Designation updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Designation::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Designation deleted successfully':'Designation not found',
        ]);
    }
}
