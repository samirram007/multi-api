<?php

namespace Modules\Aipt\StockItemPrice\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Aipt\StockItemPrice\Contracts\StockItemPriceServiceInterface;
use Modules\Aipt\StockItemPrice\Resources\StockItemPriceResource;
use Modules\Aipt\StockItemPrice\Resources\StockItemPriceCollection;
use Modules\Aipt\StockItemPrice\Requests\StockItemPriceRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class StockItemPriceController extends Controller
{
    use ApiResponseTrait;

    public function __construct(protected StockItemPriceServiceInterface $service) {}

    public function index(): SuccessCollection
    {
        $data = $this->service->getAll();
        return new StockItemPriceCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = $this->service->getById($id);
        return  new StockItemPriceResource($data);
    }

    public function store(StockItemPriceRequest $request): SuccessResource
    {
        $data = $this->service->store($request->validated());
       return  new StockItemPriceResource($data, $messages='StockItemPrice created successfully');
    }

    public function update(StockItemPriceRequest $request, int $id): SuccessResource
    {
        $data = $this->service->update($request->validated(), $id);
        return  new StockItemPriceResource($data, $messages='StockItemPrice updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=$this->service->delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'StockItemPrice deleted successfully':'StockItemPrice not found',
        ]);
    }
}
