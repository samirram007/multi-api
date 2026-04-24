<?php

namespace App\Modules\Pathology\Doctor\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\Pathology\Doctor\Resources\DoctorResource;
use App\Modules\Pathology\Doctor\Resources\DoctorCollection;
use App\Modules\Pathology\Doctor\Requests\DoctorRequest;
use App\Modules\Pathology\Doctor\Facades\DoctorFacade as Doctor;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class DoctorController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Doctor::getAll();
        return new DoctorCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Doctor::getById($id);
        return  new DoctorResource($data);
    }

    public function store(DoctorRequest $request): SuccessResource
    {
        $data = Doctor::store($request->validated());
       return  new DoctorResource($data, $messages='Doctor created successfully');
    }

    public function update(DoctorRequest $request, int $id): SuccessResource
    {
        $data = Doctor::update($request->validated(), $id);
        return  new DoctorResource($data, $messages='Doctor updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Doctor::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Doctor deleted successfully':'Doctor not found',
        ]);
    }
}
