<?php

namespace Modules\Base\UserRole\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Base\UserRole\Resources\UserRoleResource;
use Modules\Base\UserRole\Resources\UserRoleCollection;
use Modules\Base\UserRole\Requests\UserRoleRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Modules\Base\UserRole\Facades\UserRoleFacade as UserRole;

class UserRoleController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    }

    public function index(): SuccessCollection
    {
        $data = UserRole::getAll();
        return new UserRoleCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = UserRole::getById($id);
        return new UserRoleResource($data);
    }

    public function store(UserRoleRequest $request): SuccessResource|JsonResponse
    {
        $data = UserRole::store($request->validated());

        if ($data) {
            return new UserRoleResource($data ?? [], $messages = 'Role assigned successfully');
        }

        return new JsonResponse([
            'status' => $data,
            'code' => 204,
            'message' => 'Role unassigned successfully',
        ]);

    }

    public function update(UserRoleRequest $request, int $id): SuccessResource
    {
        $data = UserRole::update($request->validated(), $id);
        return new UserRoleResource($data, $messages = 'UserRole updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {

        $result = UserRole::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'UserRole deleted successfully' : 'UserRole not found',
        ]);
    }
}
