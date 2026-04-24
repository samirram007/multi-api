<?php

namespace App\Modules\School\IncomeGroup\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\IncomeGroup\Resources\IncomeGroupResource;
use App\Modules\School\IncomeGroup\Resources\IncomeGroupCollection;
use App\Modules\School\IncomeGroup\Requests\IncomeGroupRequest;
use App\Modules\School\IncomeGroup\Facades\IncomeGroupFacade as IncomeGroup;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class IncomeGroupController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = IncomeGroup::getAll();
        return new IncomeGroupCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = IncomeGroup::getById($id);
        return  new IncomeGroupResource($data);
    }

    public function store(IncomeGroupRequest $request): SuccessResource
    {
        $data = IncomeGroup::store($request->validated());
       return  new IncomeGroupResource($data, $messages='IncomeGroup created successfully');
    }

    public function update(IncomeGroupRequest $request, int $id): SuccessResource
    {
        $data = IncomeGroup::update($request->validated(), $id);
        return  new IncomeGroupResource($data, $messages='IncomeGroup updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=IncomeGroup::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'IncomeGroup deleted successfully':'IncomeGroup not found',
        ]);
    }
}
