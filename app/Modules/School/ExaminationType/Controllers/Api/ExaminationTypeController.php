<?php

namespace App\Modules\School\ExaminationType\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\ExaminationType\Resources\ExaminationTypeResource;
use App\Modules\School\ExaminationType\Resources\ExaminationTypeCollection;
use App\Modules\School\ExaminationType\Requests\ExaminationTypeRequest;
use App\Modules\School\ExaminationType\Facades\ExaminationTypeFacade as ExaminationType;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class ExaminationTypeController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = ExaminationType::getAll();
        return new ExaminationTypeCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = ExaminationType::getById($id);
        return  new ExaminationTypeResource($data);
    }

    public function store(ExaminationTypeRequest $request): SuccessResource
    {
        $data = ExaminationType::store($request->validated());
       return  new ExaminationTypeResource($data, $messages='ExaminationType created successfully');
    }

    public function update(ExaminationTypeRequest $request, int $id): SuccessResource
    {
        $data = ExaminationType::update($request->validated(), $id);
        return  new ExaminationTypeResource($data, $messages='ExaminationType updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=ExaminationType::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'ExaminationType deleted successfully':'ExaminationType not found',
        ]);
    }
}
