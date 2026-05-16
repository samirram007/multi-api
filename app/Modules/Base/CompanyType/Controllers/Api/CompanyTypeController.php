<?php

namespace Modules\Base\CompanyType\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Base\CompanyType\Contracts\CompanyTypeServiceInterface;
use Modules\Base\CompanyType\Resources\CompanyTypeResource;
use Modules\Base\CompanyType\Resources\CompanyTypeCollection;
use Modules\Base\CompanyType\Requests\CompanyTypeRequest;
use App\Http\Resources\SuccessResource;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

use Modules\Base\CompanyType\Facades\CompanyTypeFacade as CompanyType;
use App\Http\Resources\SuccessCollection;

class CompanyTypeController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = CompanyType::getAll();
        return new CompanyTypeCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = CompanyType::getById($id);
        return new CompanyTypeResource($data, 'CompanyType retrieved successfully');
    }

    public function store(CompanyTypeRequest $request): SuccessResource
    {
        $data = CompanyType::store($request->validated());
        return new CompanyTypeResource($data, 'CompanyType created successfully');
    }

    public function update(CompanyTypeRequest $request, int $id): SuccessResource
    {
        $data = CompanyType::update($request->validated(), $id);
        return new CompanyTypeResource($data, 'CompanyType updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {
         $result = CompanyType::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'CompanyType deleted successfully':'CompanyType not found',
        ]);

    }
}
