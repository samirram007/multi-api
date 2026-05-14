<?php

namespace Modules\Aipt\CostCenter\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Aipt\CostCenter\Facades\CostCenterFacade;
use Modules\Aipt\CostCenter\Resources\CostCenterResource;
use Modules\Aipt\CostCenter\Resources\CostCenterCollection;
use Modules\Aipt\CostCenter\Requests\CostCenterRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class CostCenterController extends Controller
{
    use ApiResponseTrait;

    public function index(): CostCenterCollection
    {
        $data = CostCenterFacade::getAll();
        return new CostCenterCollection($data);
    }

    public function show(int $id): CostCenterResource
    {
        $data = CostCenterFacade::getById($id);
        return new CostCenterResource($data);
    }

    public function store(CostCenterRequest $request): CostCenterResource
    {
        $data = CostCenterFacade::store($request->validated());
        return new CostCenterResource($data, 'CostCenter created successfully');
    }

    public function update(CostCenterRequest $request, int $id): CostCenterResource
    {
        $data = CostCenterFacade::update($request->validated(), $id);
        return new CostCenterResource($data, 'CostCenter updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {
        $result = CostCenterFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'CostCenter deleted successfully' : 'CostCenter not found',
        ]);
    }
}
