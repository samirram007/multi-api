<?php

namespace Modules\School\Student\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\School\Student\Resources\StudentResource;
use Modules\School\Student\Resources\StudentCollection;
use Modules\School\Student\Requests\StudentRequest;
use Modules\School\Student\Facades\StudentFacade as Student;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    }

    public function index(): SuccessCollection
    {
        $data = Student::getAll();
        return new StudentCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Student::getById($id);
        return new StudentResource($data);
    }

    public function store(StudentRequest $request): SuccessResource
    {
        $data = Student::store($request->validated());
        return new StudentResource($data, $messages = 'Student created successfully');
    }

    public function update(StudentRequest $request, int $id): SuccessResource
    {
        $data = Student::update($request->validated(), $id);
        return new StudentResource($data, $messages = 'Student updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {

        $result = Student::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'Student deleted successfully' : 'Student not found',
        ]);
    }
}
