<?php

namespace Modules\School\FeeFeeReceipt\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\School\FeeFeeReceipt\Resources\FeeFeeReceiptResource;
use Modules\School\FeeFeeReceipt\Resources\FeeFeeReceiptCollection;
use Modules\School\FeeFeeReceipt\Requests\FeeFeeReceiptRequest;
use Modules\School\FeeFeeReceipt\Facades\FeeFeeReceiptFacade as FeeFeeReceipt;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class FeeFeeReceiptController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = FeeFeeReceipt::getAll();
        return new FeeFeeReceiptCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = FeeFeeReceipt::getById($id);
        return  new FeeFeeReceiptResource($data);
    }

    public function store(FeeFeeReceiptRequest $request): SuccessResource
    {
        $data = FeeFeeReceipt::store($request->validated());
       return  new FeeFeeReceiptResource($data, $messages='FeeFeeReceipt created successfully');
    }

    public function update(FeeFeeReceiptRequest $request, int $id): SuccessResource
    {
        $data = FeeFeeReceipt::update($request->validated(), $id);
        return  new FeeFeeReceiptResource($data, $messages='FeeFeeReceipt updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=FeeFeeReceipt::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'FeeFeeReceipt deleted successfully':'FeeFeeReceipt not found',
        ]);
    }
}
