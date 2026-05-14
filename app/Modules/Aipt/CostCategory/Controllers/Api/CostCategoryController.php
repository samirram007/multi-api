<?php

namespace Modules\Aipt\CostCategory\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Aipt\CostCategory\Facades\CostCategoryFacade;
use Modules\Aipt\CostCategory\Resources\CostCategoryResource;
use Modules\Aipt\CostCategory\Resources\CostCategoryCollection;
use Modules\Aipt\CostCategory\Requests\CostCategoryRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class CostCategoryController extends Controller
{
    use ApiResponseTrait;

    public function index(): CostCategoryCollection
    {
        $data = CostCategoryFacade::getAll();
        return new CostCategoryCollection($data);
    }

    public function show(int $id): CostCategoryResource
    {
        $data = CostCategoryFacade::getById($id);
        return new CostCategoryResource($data);
    }

    public function store(CostCategoryRequest $request): CostCategoryResource
    {
        $data = CostCategoryFacade::store($request->validated());
        return new CostCategoryResource($data, 'CostCategory created successfully');
    }

    public function update(CostCategoryRequest $request, int $id): CostCategoryResource
    {
        $data = CostCategoryFacade::update($request->validated(), $id);
        return new CostCategoryResource($data, 'CostCategory updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {
        $result = CostCategoryFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'CostCategory deleted successfully' : 'CostCategory not found',
        ]);
    }
}
