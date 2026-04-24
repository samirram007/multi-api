<?php

namespace App\Modules\School\ExaminationSchedule\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\ExaminationSchedule\Resources\ExaminationScheduleResource;
use App\Modules\School\ExaminationSchedule\Resources\ExaminationScheduleCollection;
use App\Modules\School\ExaminationSchedule\Requests\ExaminationScheduleRequest;
use App\Modules\School\ExaminationSchedule\Facades\ExaminationScheduleFacade as ExaminationSchedule;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class ExaminationScheduleController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = ExaminationSchedule::getAll();
        return new ExaminationScheduleCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = ExaminationSchedule::getById($id);
        return  new ExaminationScheduleResource($data);
    }

    public function store(ExaminationScheduleRequest $request): SuccessResource
    {
        $data = ExaminationSchedule::store($request->validated());
       return  new ExaminationScheduleResource($data, $messages='ExaminationSchedule created successfully');
    }

    public function update(ExaminationScheduleRequest $request, int $id): SuccessResource
    {
        $data = ExaminationSchedule::update($request->validated(), $id);
        return  new ExaminationScheduleResource($data, $messages='ExaminationSchedule updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=ExaminationSchedule::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'ExaminationSchedule deleted successfully':'ExaminationSchedule not found',
        ]);
    }
}
