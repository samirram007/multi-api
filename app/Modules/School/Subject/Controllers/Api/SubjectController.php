<?php

namespace Modules\School\Subject\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\School\Subject\Resources\SubjectResource;
use Modules\School\Subject\Resources\SubjectCollection;
use Modules\School\Subject\Requests\SubjectRequest;
use Modules\School\Subject\Facades\SubjectFacade as Subject;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class SubjectController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Subject::getAll();
        return new SubjectCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Subject::getById($id);
        return  new SubjectResource($data);
    }

    public function store(SubjectRequest $request): SuccessResource
    {
        $data = Subject::store($request->validated());
       return  new SubjectResource($data, $messages='Subject created successfully');
    }

    public function update(SubjectRequest $request, int $id): SuccessResource
    {
        $data = Subject::update($request->validated(), $id);
        return  new SubjectResource($data, $messages='Subject updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Subject::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Subject deleted successfully':'Subject not found',
        ]);
    }
}
