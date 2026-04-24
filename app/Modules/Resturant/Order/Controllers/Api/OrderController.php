<?php

namespace App\Modules\Resturant\Order\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\Resturant\Order\Resources\OrderResource;
use App\Modules\Resturant\Order\Resources\OrderCollection;
use App\Modules\Resturant\Order\Requests\OrderRequest;
use App\Modules\Resturant\Order\Facades\OrderFacade as Order;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Order::getAll();
        return new OrderCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Order::getById($id);
        return  new OrderResource($data);
    }

    public function store(OrderRequest $request): SuccessResource
    {
        $data = Order::store($request->validated());
       return  new OrderResource($data, $messages='Order created successfully');
    }

    public function update(OrderRequest $request, int $id): SuccessResource
    {
        $data = Order::update($request->validated(), $id);
        return  new OrderResource($data, $messages='Order updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Order::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Order deleted successfully':'Order not found',
        ]);
    }
}
