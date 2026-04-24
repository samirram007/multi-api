<?php

namespace App\Modules\School\Teacher\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\Teacher\Resources\TeacherResource;
use App\Modules\School\Teacher\Resources\TeacherCollection;
use App\Modules\School\Teacher\Requests\TeacherRequest;
use App\Modules\School\Teacher\Facades\TeacherFacade as Teacher;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class TeacherController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Teacher::getAll();
        return new TeacherCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Teacher::getById($id);
        return  new TeacherResource($data);
    }

    public function store(TeacherRequest $request): SuccessResource
    {
        $data = Teacher::store($request->validated());
       return  new TeacherResource($data, $messages='Teacher created successfully');
    }

    public function update(TeacherRequest $request, int $id): SuccessResource
    {
        $data = Teacher::update($request->validated(), $id);
        return  new TeacherResource($data, $messages='Teacher updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Teacher::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Teacher deleted successfully':'Teacher not found',
        ]);
    }
}
