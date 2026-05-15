<?php

namespace Modules\School\FeeReceipt\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\School\FeeReceipt\Resources\FeeReceiptResource;
use Modules\School\FeeReceipt\Resources\FeeReceiptCollection;
use Modules\School\FeeReceipt\Requests\FeeReceiptRequest;
use Modules\School\FeeReceipt\Facades\FeeReceiptFacade as FeeReceipt;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class FeeReceiptController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = FeeReceipt::getAll();
        return new FeeReceiptCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = FeeReceipt::getById($id);
        return  new FeeReceiptResource($data);
    }

    public function store(FeeReceiptRequest $request): SuccessResource
    {
        $data = FeeReceipt::store($request->validated());
       return  new FeeReceiptResource($data, $messages='FeeReceipt created successfully');
    }

    public function update(FeeReceiptRequest $request, int $id): SuccessResource
    {
        $data = FeeReceipt::update($request->validated(), $id);
        return  new FeeReceiptResource($data, $messages='FeeReceipt updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=FeeReceipt::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'FeeReceipt deleted successfully':'FeeReceipt not found',
        ]);
    }
}
