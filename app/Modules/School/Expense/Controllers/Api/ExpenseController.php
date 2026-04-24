<?php

namespace App\Modules\School\Expense\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\Expense\Resources\ExpenseResource;
use App\Modules\School\Expense\Resources\ExpenseCollection;
use App\Modules\School\Expense\Requests\ExpenseRequest;
use App\Modules\School\Expense\Facades\ExpenseFacade as Expense;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class ExpenseController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Expense::getAll();
        return new ExpenseCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Expense::getById($id);
        return  new ExpenseResource($data);
    }

    public function store(ExpenseRequest $request): SuccessResource
    {
        $data = Expense::store($request->validated());
       return  new ExpenseResource($data, $messages='Expense created successfully');
    }

    public function update(ExpenseRequest $request, int $id): SuccessResource
    {
        $data = Expense::update($request->validated(), $id);
        return  new ExpenseResource($data, $messages='Expense updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Expense::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Expense deleted successfully':'Expense not found',
        ]);
    }
}
