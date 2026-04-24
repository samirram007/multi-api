<?php

namespace App\Modules\School\ExpenseGroup\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\ExpenseGroup\Resources\ExpenseGroupResource;
use App\Modules\School\ExpenseGroup\Resources\ExpenseGroupCollection;
use App\Modules\School\ExpenseGroup\Requests\ExpenseGroupRequest;
use App\Modules\School\ExpenseGroup\Facades\ExpenseGroupFacade as ExpenseGroup;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class ExpenseGroupController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = ExpenseGroup::getAll();
        return new ExpenseGroupCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = ExpenseGroup::getById($id);
        return  new ExpenseGroupResource($data);
    }

    public function store(ExpenseGroupRequest $request): SuccessResource
    {
        $data = ExpenseGroup::store($request->validated());
       return  new ExpenseGroupResource($data, $messages='ExpenseGroup created successfully');
    }

    public function update(ExpenseGroupRequest $request, int $id): SuccessResource
    {
        $data = ExpenseGroup::update($request->validated(), $id);
        return  new ExpenseGroupResource($data, $messages='ExpenseGroup updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=ExpenseGroup::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'ExpenseGroup deleted successfully':'ExpenseGroup not found',
        ]);
    }
}
