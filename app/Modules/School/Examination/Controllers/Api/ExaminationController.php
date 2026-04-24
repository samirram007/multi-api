<?php

namespace App\Modules\School\Examination\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\Examination\Resources\ExaminationResource;
use App\Modules\School\Examination\Resources\ExaminationCollection;
use App\Modules\School\Examination\Requests\ExaminationRequest;
use App\Modules\School\Examination\Facades\ExaminationFacade as Examination;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class ExaminationController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Examination::getAll();
        return new ExaminationCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Examination::getById($id);
        return  new ExaminationResource($data);
    }

    public function store(ExaminationRequest $request): SuccessResource
    {
        $data = Examination::store($request->validated());
       return  new ExaminationResource($data, $messages='Examination created successfully');
    }

    public function update(ExaminationRequest $request, int $id): SuccessResource
    {
        $data = Examination::update($request->validated(), $id);
        return  new ExaminationResource($data, $messages='Examination updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Examination::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Examination deleted successfully':'Examination not found',
        ]);
    }
}
