<?php

namespace Modules\Aipt\AccountNature\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Aipt\AccountNature\Facades\AccountNatureFacade;
use Modules\Aipt\AccountNature\Resources\AccountNatureResource;
use Modules\Aipt\AccountNature\Resources\AccountNatureCollection;
use Modules\Aipt\AccountNature\Requests\AccountNatureRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class AccountNatureController extends Controller
{
    use ApiResponseTrait;

    public function index(): AccountNatureCollection
    {
        $data = AccountNatureFacade::getAll();
        return new AccountNatureCollection($data);
    }

    public function show(int $id): AccountNatureResource
    {
        $data = AccountNatureFacade::getById($id);
        return new AccountNatureResource($data, 'AccountNature retrieved successfully');
    }

    public function store(AccountNatureRequest $request): AccountNatureResource
    {
        $data = AccountNatureFacade::store($request->validated());
        return new AccountNatureResource($data, 'AccountNature created successfully');
    }

    public function update(AccountNatureRequest $request, int $id): AccountNatureResource
    {
        $data = AccountNatureFacade::update($request->validated(), $id);
        return new AccountNatureResource($data, 'AccountNature updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {
        $result = AccountNatureFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'AccountNature deleted successfully' : 'AccountNature not found',
        ]);
    }
}
