<?php

namespace Modules\Aipt\DistributorBook\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Aipt\DistributorBook\Facades\DistributorBookFacade;
use Modules\Aipt\DistributorBook\Resources\DistributorBookResource;
use Modules\Aipt\DistributorBook\Resources\DistributorBookCollection;
use Modules\Aipt\DistributorBook\Requests\DistributorBookRequest;
use Modules\Aipt\Voucher\Resources\VoucherCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class DistributorBookController extends Controller
{
    use ApiResponseTrait;

    public function index(): DistributorBookCollection
    {
        $data = DistributorBookFacade::getAll();
        return new DistributorBookCollection($data);
    }

    public function show(int $id): VoucherCollection
    {
        $data = DistributorBookFacade::getById($id);
        return new VoucherCollection($data);
    }

    public function store(DistributorBookRequest $request): DistributorBookResource
    {
        $data = DistributorBookFacade::store($request->validated());
        return new DistributorBookResource($data, $messages = 'DistributorBook created successfully');
    }

    public function update(DistributorBookRequest $request, int $id): DistributorBookResource
    {
        $data = DistributorBookFacade::update($request->validated(), $id);
        return new DistributorBookResource($data, $messages = 'DistributorBook updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {

        $result = DistributorBookFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'DistributorBook deleted successfully' : 'DistributorBook not found',
        ]);
    }
}
