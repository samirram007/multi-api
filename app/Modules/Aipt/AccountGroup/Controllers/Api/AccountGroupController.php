<?php

namespace Modules\Aipt\AccountGroup\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Aipt\AccountGroup\Facades\AccountGroupFacade;
use Modules\Aipt\AccountGroup\Resources\AccountGroupCollection;
use Modules\Aipt\AccountGroup\Resources\AccountGroupResource;
use Modules\Aipt\AccountGroup\Requests\AccountGroupRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class AccountGroupController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    }

    public function index(): AccountGroupCollection
    {
        return new AccountGroupCollection(AccountGroupFacade::getAll());
    }

    public function show(int $id): AccountGroupResource
    {
        return new AccountGroupResource(AccountGroupFacade::getById($id), 'AccountGroup retrieved successfully');
    }

    public function store(AccountGroupRequest $request): AccountGroupResource
    {
        return new AccountGroupResource(
            AccountGroupFacade::store($request->validated()),
            'AccountGroup created successfully'
        );
    }

    public function update(AccountGroupRequest $request, int $id): AccountGroupResource
    {
        return new AccountGroupResource(
            AccountGroupFacade::update($request->validated(), $id),
            'AccountGroup updated successfully'
        );
    }

    public function destroy(int $id): JsonResponse
    {
        $result = AccountGroupFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => $result ? 204 : 404,
            'message' => $result ? 'AccountGroup deleted successfully' : 'AccountGroup not found',
        ]);
    }

    public function current_liability_groups(): AccountGroupCollection
    {
        return new AccountGroupCollection(AccountGroupFacade::getCurrentLiabilityGroups());
    }
}
