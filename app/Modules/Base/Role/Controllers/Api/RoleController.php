<?php

namespace Modules\Base\Role\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Base\Role\Resources\RoleResource;
use Modules\Base\Role\Resources\RoleCollection;
use Modules\Base\Role\Requests\RoleRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Modules\Base\Role\Facades\RoleFacade as Role;

class RoleController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    }

    public function index(): SuccessCollection
    {

        $data = Role::getAll();
        return new RoleCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Role::getById($id);
        return new RoleResource($data);
    }

    public function store(RoleRequest $request): SuccessResource
    {
        $data = Role::store($request->validated());
        return new RoleResource($data, $messages = 'Role created successfully');
    }

    public function update(RoleRequest $request, int $id): SuccessResource
    {
        $data = Role::update($request->validated(), $id);
        return new RoleResource($data, $messages = 'Role updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {

        $result = Role::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'Role deleted successfully' : 'Role not found',
        ]);
    }
}
