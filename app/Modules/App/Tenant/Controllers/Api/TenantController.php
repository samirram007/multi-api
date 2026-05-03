<?php

namespace Modules\App\Tenant\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\App\Tenant\Resources\TenantResource;
use Modules\App\Tenant\Resources\TenantCollection;
use Modules\App\Tenant\Requests\TenantRequest;
use Modules\App\Tenant\Facades\TenantFacade as Tenant;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class TenantController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Tenant::getAll();
        return new TenantCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Tenant::getById($id);
        return  new TenantResource($data);
    }

    public function store(TenantRequest $request): SuccessResource
    {
        $data = Tenant::store($request->validated());
       return  new TenantResource($data, $messages='Tenant created successfully');
    }

    public function update(TenantRequest $request, int $id): SuccessResource
    {
        $data = Tenant::update($request->validated(), $id);
        return  new TenantResource($data, $messages='Tenant updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Tenant::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Tenant deleted successfully':'Tenant not found',
        ]);
    }
}
