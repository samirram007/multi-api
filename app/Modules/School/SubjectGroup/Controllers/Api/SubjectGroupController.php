<?php

namespace Modules\School\SubjectGroup\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\School\SubjectGroup\Resources\SubjectGroupResource;
use Modules\School\SubjectGroup\Resources\SubjectGroupCollection;
use Modules\School\SubjectGroup\Requests\SubjectGroupRequest;
use Modules\School\SubjectGroup\Facades\SubjectGroupFacade as SubjectGroup;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class SubjectGroupController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = SubjectGroup::getAll();
        return new SubjectGroupCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = SubjectGroup::getById($id);
        return  new SubjectGroupResource($data);
    }

    public function store(SubjectGroupRequest $request): SuccessResource
    {
        $data = SubjectGroup::store($request->validated());
       return  new SubjectGroupResource($data, $messages='SubjectGroup created successfully');
    }

    public function update(SubjectGroupRequest $request, int $id): SuccessResource
    {
        $data = SubjectGroup::update($request->validated(), $id);
        return  new SubjectGroupResource($data, $messages='SubjectGroup updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=SubjectGroup::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'SubjectGroup deleted successfully':'SubjectGroup not found',
        ]);
    }
}
