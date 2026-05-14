<?php

namespace Modules\Aipt\DayBook\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Aipt\DayBook\Facades\DayBookFacade;
use Modules\Aipt\DayBook\Resources\DayBookResource;
use Modules\Aipt\DayBook\Requests\DayBookRequest;
use Modules\Aipt\Voucher\Resources\VoucherCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class DayBookController extends Controller
{
    use ApiResponseTrait;

    public function index(): VoucherCollection
    {
        $data = DayBookFacade::getAll();
        return new VoucherCollection($data);
    }

    public function dayBooksSelf(): VoucherCollection
    {
        $data = DayBookFacade::dayBooksSelf();
        return new VoucherCollection($data);
    }

    public function show(int $id): DayBookResource
    {
        $data = DayBookFacade::getById($id);
        return new DayBookResource($data, 'DayBook retrieved successfully');
    }

    public function store(DayBookRequest $request): DayBookResource
    {
        $data = DayBookFacade::store($request->validated());
        return new DayBookResource($data, 'DayBook created successfully');
    }

    public function update(DayBookRequest $request, int $id): DayBookResource
    {
        $data = DayBookFacade::update($request->validated(), $id);
        return new DayBookResource($data, 'DayBook updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {
        $result = DayBookFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'DayBook deleted successfully' : 'DayBook not found',
        ]);
    }
}
