<?php

namespace App\Modules\School\Admission\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\Admission\Resources\AdmissionResource;
use App\Modules\School\Admission\Resources\AdmissionCollection;
use App\Modules\School\Admission\Requests\AdmissionRequest;
use App\Modules\School\Admission\Facades\AdmissionFacade as Admission;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class AdmissionController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Admission::getAll();
        return new AdmissionCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Admission::getById($id);
        return  new AdmissionResource($data);
    }

    public function store(AdmissionRequest $request): SuccessResource
    {
        $data = Admission::store($request->validated());
       return  new AdmissionResource($data, $messages='Admission created successfully');
    }

    public function update(AdmissionRequest $request, int $id): SuccessResource
    {
        $data = Admission::update($request->validated(), $id);
        return  new AdmissionResource($data, $messages='Admission updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Admission::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Admission deleted successfully':'Admission not found',
        ]);
    }
}
