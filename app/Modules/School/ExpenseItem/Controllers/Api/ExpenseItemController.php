<?php

namespace Modules\School\ExpenseItem\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\School\ExpenseItem\Resources\ExpenseItemResource;
use Modules\School\ExpenseItem\Resources\ExpenseItemCollection;
use Modules\School\ExpenseItem\Requests\ExpenseItemRequest;
use Modules\School\ExpenseItem\Facades\ExpenseItemFacade as ExpenseItem;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class ExpenseItemController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = ExpenseItem::getAll();
        return new ExpenseItemCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = ExpenseItem::getById($id);
        return  new ExpenseItemResource($data);
    }

    public function store(ExpenseItemRequest $request): SuccessResource
    {
        $data = ExpenseItem::store($request->validated());
       return  new ExpenseItemResource($data, $messages='ExpenseItem created successfully');
    }

    public function update(ExpenseItemRequest $request, int $id): SuccessResource
    {
        $data = ExpenseItem::update($request->validated(), $id);
        return  new ExpenseItemResource($data, $messages='ExpenseItem updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=ExpenseItem::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'ExpenseItem deleted successfully':'ExpenseItem not found',
        ]);
    }
}
