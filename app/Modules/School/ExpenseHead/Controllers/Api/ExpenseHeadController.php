<?php

namespace App\Modules\School\ExpenseHead\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\ExpenseHead\Resources\ExpenseHeadResource;
use App\Modules\School\ExpenseHead\Resources\ExpenseHeadCollection;
use App\Modules\School\ExpenseHead\Requests\ExpenseHeadRequest;
use App\Modules\School\ExpenseHead\Facades\ExpenseHeadFacade as ExpenseHead;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class ExpenseHeadController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = ExpenseHead::getAll();
        return new ExpenseHeadCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = ExpenseHead::getById($id);
        return  new ExpenseHeadResource($data);
    }

    public function store(ExpenseHeadRequest $request): SuccessResource
    {
        $data = ExpenseHead::store($request->validated());
       return  new ExpenseHeadResource($data, $messages='ExpenseHead created successfully');
    }

    public function update(ExpenseHeadRequest $request, int $id): SuccessResource
    {
        $data = ExpenseHead::update($request->validated(), $id);
        return  new ExpenseHeadResource($data, $messages='ExpenseHead updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=ExpenseHead::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'ExpenseHead deleted successfully':'ExpenseHead not found',
        ]);
    }
}
