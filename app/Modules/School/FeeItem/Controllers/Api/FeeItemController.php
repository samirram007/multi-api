<?php

namespace App\Modules\School\FeeItem\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\FeeItem\Resources\FeeItemResource;
use App\Modules\School\FeeItem\Resources\FeeItemCollection;
use App\Modules\School\FeeItem\Requests\FeeItemRequest;
use App\Modules\School\FeeItem\Facades\FeeItemFacade as FeeItem;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class FeeItemController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = FeeItem::getAll();
        return new FeeItemCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = FeeItem::getById($id);
        return  new FeeItemResource($data);
    }

    public function store(FeeItemRequest $request): SuccessResource
    {
        $data = FeeItem::store($request->validated());
       return  new FeeItemResource($data, $messages='FeeItem created successfully');
    }

    public function update(FeeItemRequest $request, int $id): SuccessResource
    {
        $data = FeeItem::update($request->validated(), $id);
        return  new FeeItemResource($data, $messages='FeeItem updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=FeeItem::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'FeeItem deleted successfully':'FeeItem not found',
        ]);
    }
}
