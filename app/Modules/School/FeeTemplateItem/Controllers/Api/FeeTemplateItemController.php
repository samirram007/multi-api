<?php

namespace Modules\School\FeeTemplateItem\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\School\FeeTemplateItem\Resources\FeeTemplateItemResource;
use Modules\School\FeeTemplateItem\Resources\FeeTemplateItemCollection;
use Modules\School\FeeTemplateItem\Requests\FeeTemplateItemRequest;
use Modules\School\FeeTemplateItem\Facades\FeeTemplateItemFacade as FeeTemplateItem;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class FeeTemplateItemController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = FeeTemplateItem::getAll();
        return new FeeTemplateItemCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = FeeTemplateItem::getById($id);
        return  new FeeTemplateItemResource($data);
    }

    public function store(FeeTemplateItemRequest $request): SuccessResource
    {
        $data = FeeTemplateItem::store($request->validated());
       return  new FeeTemplateItemResource($data, $messages='FeeTemplateItem created successfully');
    }

    public function update(FeeTemplateItemRequest $request, int $id): SuccessResource
    {
        $data = FeeTemplateItem::update($request->validated(), $id);
        return  new FeeTemplateItemResource($data, $messages='FeeTemplateItem updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=FeeTemplateItem::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'FeeTemplateItem deleted successfully':'FeeTemplateItem not found',
        ]);
    }
}
