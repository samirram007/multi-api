<?php

namespace Modules\Base\User\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Base\User\Resources\UserResource;
use Modules\Base\User\Resources\UserCollection;
use Modules\Base\User\Requests\UserRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Modules\Base\User\Facades\UserFacade as User;

class UserController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    }

    public function index(): SuccessCollection
    {
        $data = User::getAll();
        return new UserCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = User::getById($id);
        return new SuccessResource($data, 'User retrieved successfully');
    }

    public function store(UserRequest $request): SuccessResource
    {
        $data = User::store($request->validated());
        return new SuccessResource($data, 'User created successfully');
    }

    public function update(UserRequest $request, int $id): SuccessResource
    {
        $data = User::update($request->validated(), $id);
        return new SuccessResource($data, 'User updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {
        $result = User::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'User deleted successfully' : 'User not found',
        ]);
    }
}
