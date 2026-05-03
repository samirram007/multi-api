<?php

namespace Modules\App\TenantUser\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\App\TenantUser\Resources\TenantUserResource;
use Modules\App\TenantUser\Resources\TenantUserCollection;
use Modules\App\TenantUser\Requests\TenantUserRequest;
use Modules\App\TenantUser\Facades\TenantUserFacade as TenantUser;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class TenantUserController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = TenantUser::getAll();
        return new TenantUserCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = TenantUser::getById($id);
        return  new TenantUserResource($data);
    }

    public function store(TenantUserRequest $request): SuccessResource
    {
        $data = TenantUser::store($request->validated());
       return  new TenantUserResource($data, $messages='TenantUser created successfully');
    }

    public function update(TenantUserRequest $request, int $id): SuccessResource
    {
        $data = TenantUser::update($request->validated(), $id);
        return  new TenantUserResource($data, $messages='TenantUser updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=TenantUser::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'TenantUser deleted successfully':'TenantUser not found',
        ]);
    }
}
