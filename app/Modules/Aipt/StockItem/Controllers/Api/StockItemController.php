<?php

namespace Modules\Aipt\StockItem\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Aipt\StockItem\Contracts\StockItemServiceInterface;
use Modules\Aipt\StockItem\Resources\StockItemResource;
use Modules\Aipt\StockItem\Resources\StockItemCollection;
use Modules\Aipt\StockItem\Requests\StockItemRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class StockItemController extends Controller
{
    use ApiResponseTrait;

    public function __construct(protected StockItemServiceInterface $service)
    {
    }

    public function index(): SuccessCollection
    {
        $data = $this->service->getAll();
        return new StockItemCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = $this->service->getById($id);
        return new StockItemResource($data);
    }

    public function store(StockItemRequest $request): SuccessResource
    {
        $data = $this->service->store($request->validated());
        return new StockItemResource($data, $messages = 'StockItem created successfully');
    }

    public function update(StockItemRequest $request, int $id): SuccessResource
    {
        $data = $this->service->update($request->validated(), $id);
        return new StockItemResource($data, $messages = 'StockItem updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {

        $result = $this->service->delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'StockItem deleted successfully' : 'StockItem not found',
        ]);
    }
    public function purchasable_stock_items(): SuccessCollection
    {
        $data = $this->service->getPurchasableStockItems();
        return new StockItemCollection($data);
    }

}
