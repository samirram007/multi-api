<?php

namespace Modules\Base\RolePermission\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Base\RolePermission\Resources\RolePermissionResource;
use Modules\Base\RolePermission\Resources\RolePermissionCollection;
use Modules\Base\RolePermission\Requests\RolePermissionRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Modules\Base\RolePermission\Facades\RolePermissionFacade as RolePermission;

class RolePermissionController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = RolePermission::getAll();
        return new RolePermissionCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = RolePermission::getById($id);
        return  new RolePermissionResource($data);
    }

    public function store(RolePermissionRequest $request): SuccessResource
    {
        $data = RolePermission::store($request->validated());
       return  new RolePermissionResource($data, $messages='RolePermission created successfully');
    }

    public function update(RolePermissionRequest $request, int $id): SuccessResource
    {
        $data = RolePermission::update($request->validated(), $id);
        return  new RolePermissionResource($data, $messages='RolePermission updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=RolePermission::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'RolePermission deleted successfully':'RolePermission not found',
        ]);
    }
}
