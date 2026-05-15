<?php

namespace Modules\School\StudentSession\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\School\StudentSession\Resources\StudentSessionResource;
use Modules\School\StudentSession\Resources\StudentSessionCollection;
use Modules\School\StudentSession\Requests\StudentSessionRequest;
use Modules\School\StudentSession\Facades\StudentSessionFacade as StudentSession;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class StudentSessionController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = StudentSession::getAll();
        return new StudentSessionCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = StudentSession::getById($id);
        return  new StudentSessionResource($data);
    }

    public function store(StudentSessionRequest $request): SuccessResource
    {
        $data = StudentSession::store($request->validated());
       return  new StudentSessionResource($data, $messages='StudentSession created successfully');
    }

    public function update(StudentSessionRequest $request, int $id): SuccessResource
    {
        $data = StudentSession::update($request->validated(), $id);
        return  new StudentSessionResource($data, $messages='StudentSession updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=StudentSession::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'StudentSession deleted successfully':'StudentSession not found',
        ]);
    }
}
