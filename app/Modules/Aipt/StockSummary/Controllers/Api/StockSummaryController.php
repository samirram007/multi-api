<?php

namespace Modules\Aipt\StockSummary\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Aipt\StockSummary\Contracts\StockSummaryServiceInterface;
use Modules\Aipt\StockSummary\Resources\StockInHandCollection;
use Modules\Aipt\StockSummary\Resources\StockInHandStorageUnitResource;
use Modules\Aipt\StockSummary\Resources\StockInHandStorageUnitWiseResource;
use Modules\Aipt\StockSummary\Resources\StockInHandItemDetailsResource;
use Modules\Aipt\StockSummary\Resources\StockInHandItemWiseResource;
use Modules\Aipt\StockSummary\Resources\StockInHandResource;
use Modules\Aipt\StockSummary\Resources\StockInHandVoucherWiseResource;
use Modules\Aipt\StockSummary\Resources\StockInHandZoneWiseResource;
use Modules\Aipt\StockSummary\Resources\StockSummaryResource;
use Modules\Aipt\StockSummary\Resources\StockSummaryCollection;
use Modules\Aipt\StockSummary\Requests\StockSummaryRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class StockSummaryController extends Controller
{
    use ApiResponseTrait;

    public function __construct(protected StockSummaryServiceInterface $service)
    {
    }

    public function stock_in_hand(): StockInHandCollection
    {
        $data = $this->service->stockInHand();
        // dd($data);
        return new StockInHandCollection($data);
    }
    public function stock_in_hand_item_wise(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection|array
    {
        $data = $this->service->stock_in_hand_item_wise();
        return StockInHandItemWiseResource::collection($data);
    }
    public function stock_in_hand_zone_wise(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection|array
    {
        $data = $this->service->stock_in_hand_zone_wise();
        // dd($data);
        return StockInHandZoneWiseResource::collection($data);
    }
    public function stock_in_hand_storage_unit_wise(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection|array
    {
        $data = $this->service->stock_in_hand_storage_unit_wise();
        // dd($data);
        return StockInHandStorageUnitWiseResource::collection($data);
    }
    public function stock_in_hand_voucher_wise(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection|array
    {
        $data = $this->service->stock_in_hand_voucher_wise();
        // dd($data);
        return StockInHandVoucherWiseResource::collection($data);
    }

    public function net_stock(StockSummaryRequest $request): SuccessResource
    {
        $data = $this->service->netStock($request->validated());
        return new StockSummaryResource($data);
    }

    public function purchase_order_outstanding(): SuccessResource
    {
        $data = $this->service->purchaseOrderOutstanding();
        return new StockSummaryResource($data);
    }
    public function saleble_stock(): SuccessResource
    {
        $data = $this->service->salebleStock();
        return new StockSummaryResource($data);
    }
    public function sales_order_outstanding(): SuccessResource
    {
        $data = $this->service->salesOrderOutstanding();
        return new StockSummaryResource($data);
    }


}
