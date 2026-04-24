<?php

namespace App\Modules\School\ExaminationStandard\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\ExaminationStandard\Resources\ExaminationStandardResource;
use App\Modules\School\ExaminationStandard\Resources\ExaminationStandardCollection;
use App\Modules\School\ExaminationStandard\Requests\ExaminationStandardRequest;
use App\Modules\School\ExaminationStandard\Facades\ExaminationStandardFacade as ExaminationStandard;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class ExaminationStandardController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = ExaminationStandard::getAll();
        return new ExaminationStandardCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = ExaminationStandard::getById($id);
        return  new ExaminationStandardResource($data);
    }

    public function store(ExaminationStandardRequest $request): SuccessResource
    {
        $data = ExaminationStandard::store($request->validated());
       return  new ExaminationStandardResource($data, $messages='ExaminationStandard created successfully');
    }

    public function update(ExaminationStandardRequest $request, int $id): SuccessResource
    {
        $data = ExaminationStandard::update($request->validated(), $id);
        return  new ExaminationStandardResource($data, $messages='ExaminationStandard updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=ExaminationStandard::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'ExaminationStandard deleted successfully':'ExaminationStandard not found',
        ]);
    }
}
