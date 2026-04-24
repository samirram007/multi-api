<?php

namespace App\Modules\Hospital\Patient\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\Hospital\Patient\Resources\PatientResource;
use App\Modules\Hospital\Patient\Resources\PatientCollection;
use App\Modules\Hospital\Patient\Requests\PatientRequest;
use App\Modules\Hospital\Patient\Facades\PatientFacade as Patient;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class PatientController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Patient::getAll();
        return new PatientCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Patient::getById($id);
        return  new PatientResource($data);
    }

    public function store(PatientRequest $request): SuccessResource
    {
        $data = Patient::store($request->validated());
       return  new PatientResource($data, $messages='Patient created successfully');
    }

    public function update(PatientRequest $request, int $id): SuccessResource
    {
        $data = Patient::update($request->validated(), $id);
        return  new PatientResource($data, $messages='Patient updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Patient::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Patient deleted successfully':'Patient not found',
        ]);
    }
}
