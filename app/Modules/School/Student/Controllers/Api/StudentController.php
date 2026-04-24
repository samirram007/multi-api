<?php

namespace App\Modules\School\Student\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\School\Student\Contracts\StudentServiceInterface;
use App\Modules\School\Student\Resources\StudentResource;
use App\Modules\School\Student\Resources\StudentCollection;
use App\Modules\School\Student\Requests\StudentRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    use ApiResponseTrait;

    public function __construct(protected StudentServiceInterface $service)
    {
    }

    public function index(): SuccessCollection
    {
        $data = $this->service->getAll();
        return new StudentCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = $this->service->getById($id);
        return new StudentResource($data);
    }

    public function store(StudentRequest $request): SuccessResource
    {
        $data = $this->service->store($request->validated());
        return new StudentResource($data, $messages = 'Student created successfully');
    }

    public function update(StudentRequest $request, int $id): SuccessResource
    {
        $data = $this->service->update($request->validated(), $id);
        return new StudentResource($data, $messages = 'Student updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {

        $result = $this->service->delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'Student deleted successfully' : 'Student not found',
        ]);
    }
}
