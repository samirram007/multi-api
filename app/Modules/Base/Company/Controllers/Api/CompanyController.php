<?php

namespace Modules\Base\Company\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\Base\Company\Facades\CompanyFacade;
use Modules\Base\Company\Resources\CompanyResource;
use Modules\Base\Company\Resources\CompanyCollection;
use Modules\Base\Company\Requests\CompanyRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class CompanyController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    }

    public function index(): SuccessCollection
    {
        $data = CompanyFacade::getAll();
        return new CompanyCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = CompanyFacade::getById($id);
        return new CompanyResource($data, $messages = 'Company retrieved successfully');
    }

    public function store(CompanyRequest $request): SuccessResource
    {
        $data = CompanyFacade::store($request->validated());
        return new CompanyResource($data, $messages = 'Company created successfully');
    }

    public function update(CompanyRequest $request, int $id): SuccessResource
    {
        $data = CompanyFacade::update($request->validated(), $id);
        return new CompanyResource($data, $messages = 'Company updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {
        $result = CompanyFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'Company deleted successfully' : 'Company not found',
        ]);
    }
}
