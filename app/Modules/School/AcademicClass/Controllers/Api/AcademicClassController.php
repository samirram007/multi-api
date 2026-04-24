<?php

namespace App\Modules\School\AcademicClass\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\AcademicClass\Resources\AcademicClassResource;
use App\Modules\School\AcademicClass\Resources\AcademicClassCollection;
use App\Modules\School\AcademicClass\Requests\AcademicClassRequest;
use App\Modules\School\AcademicClass\Facades\AcademicClassFacade as AcademicClass;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class AcademicClassController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = AcademicClass::getAll();
        return new AcademicClassCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = AcademicClass::getById($id);
        return  new AcademicClassResource($data);
    }

    public function store(AcademicClassRequest $request): SuccessResource
    {
        $data = AcademicClass::store($request->validated());
       return  new AcademicClassResource($data, $messages='AcademicClass created successfully');
    }

    public function update(AcademicClassRequest $request, int $id): SuccessResource
    {
        $data = AcademicClass::update($request->validated(), $id);
        return  new AcademicClassResource($data, $messages='AcademicClass updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=AcademicClass::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'AcademicClass deleted successfully':'AcademicClass not found',
        ]);
    }
}
