<?php

namespace App\Modules\School\AcademicStandard\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\AcademicStandard\Resources\AcademicStandardResource;
use App\Modules\School\AcademicStandard\Resources\AcademicStandardCollection;
use App\Modules\School\AcademicStandard\Requests\AcademicStandardRequest;
use App\Modules\School\AcademicStandard\Facades\AcademicStandardFacade as AcademicStandard;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class AcademicStandardController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = AcademicStandard::getAll();
        return new AcademicStandardCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = AcademicStandard::getById($id);
        return  new AcademicStandardResource($data);
    }

    public function store(AcademicStandardRequest $request): SuccessResource
    {
        $data = AcademicStandard::store($request->validated());
       return  new AcademicStandardResource($data, $messages='AcademicStandard created successfully');
    }

    public function update(AcademicStandardRequest $request, int $id): SuccessResource
    {
        $data = AcademicStandard::update($request->validated(), $id);
        return  new AcademicStandardResource($data, $messages='AcademicStandard updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=AcademicStandard::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'AcademicStandard deleted successfully':'AcademicStandard not found',
        ]);
    }
}
