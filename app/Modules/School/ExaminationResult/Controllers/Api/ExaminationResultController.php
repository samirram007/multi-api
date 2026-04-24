<?php

namespace App\Modules\School\ExaminationResult\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\ExaminationResult\Resources\ExaminationResultResource;
use App\Modules\School\ExaminationResult\Resources\ExaminationResultCollection;
use App\Modules\School\ExaminationResult\Requests\ExaminationResultRequest;
use App\Modules\School\ExaminationResult\Facades\ExaminationResultFacade as ExaminationResult;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class ExaminationResultController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = ExaminationResult::getAll();
        return new ExaminationResultCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = ExaminationResult::getById($id);
        return  new ExaminationResultResource($data);
    }

    public function store(ExaminationResultRequest $request): SuccessResource
    {
        $data = ExaminationResult::store($request->validated());
       return  new ExaminationResultResource($data, $messages='ExaminationResult created successfully');
    }

    public function update(ExaminationResultRequest $request, int $id): SuccessResource
    {
        $data = ExaminationResult::update($request->validated(), $id);
        return  new ExaminationResultResource($data, $messages='ExaminationResult updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=ExaminationResult::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'ExaminationResult deleted successfully':'ExaminationResult not found',
        ]);
    }
}
