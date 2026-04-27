<?php

namespace Modules\Base\User\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Base\User\Contracts\UserServiceInterface;
use Modules\Base\User\Resources\UserResource;
use Modules\Base\User\Resources\UserCollection;
use Modules\Base\User\Requests\UserRequest;
use App\Http\Resources\SuccessResource;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    use ApiResponseTrait;

    public function __construct(protected UserServiceInterface $service)
    {
    }

    public function index(): JsonResponse
    {
        $data = $this->service->getAll();
        return (new UserCollection($data))->response();
    }

    public function show(int $id): JsonResponse
    {
        $data = $this->service->getById($id);
        return $this->resourceResponse(
            new UserResource($data),
            'User retrieved successfully'
        );
    }

    public function store(UserRequest $request): JsonResponse
    {
        $data = $this->service->store($request->validated());
        return $this->resourceResponse(
            new UserResource($data),
            'User created successfully',
            201
        );
    }

    public function update(UserRequest $request, int $id): JsonResponse
    {
        $data = $this->service->update($request->validated(), $id);
        return $this->resourceResponse(
            new UserResource($data),
            'User updated successfully'
        );
    }

    public function destroy(int $id): JsonResponse
    {
        $result = $this->service->delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'User deleted successfully' : 'User not found',
        ]);
    }
}
