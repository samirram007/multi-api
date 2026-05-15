<?php

namespace Modules\School\Promotion\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\School\Promotion\Resources\PromotionResource;
use Modules\School\Promotion\Resources\PromotionCollection;
use Modules\School\Promotion\Requests\PromotionRequest;
use Modules\School\Promotion\Facades\PromotionFacade as Promotion;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class PromotionController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Promotion::getAll();
        return new PromotionCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Promotion::getById($id);
        return  new PromotionResource($data);
    }

    public function store(PromotionRequest $request): SuccessResource
    {
        $data = Promotion::store($request->validated());
       return  new PromotionResource($data, $messages='Promotion created successfully');
    }

    public function update(PromotionRequest $request, int $id): SuccessResource
    {
        $data = Promotion::update($request->validated(), $id);
        return  new PromotionResource($data, $messages='Promotion updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Promotion::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Promotion deleted successfully':'Promotion not found',
        ]);
    }
}
