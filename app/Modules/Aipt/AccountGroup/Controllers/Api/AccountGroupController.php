<?php

namespace Modules\Aipt\AccountGroup\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SuccessCollection;
use App\Http\Resources\SuccessResource;
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

    public function index(): SuccessCollection
    {

        $data = AccountGroupFacade::getAll();

        return new AccountGroupCollection($data);
    }
    public function show(int $id): ?SuccessResource
    {
        $data = AccountGroupFacade::getById($id);
        // dd($data);
        return new AccountGroupResource($data, $message = 'AccountGroup retrieved successfully');
    }

    public function store(AccountGroupRequest $request): SuccessResource
    {
        $data = AccountGroupFacade::store($request->validated());
        return
            new AccountGroupResource(
                $data,
                $message = 'AccountGroup created successfully',
            );
    }

    public function update(AccountGroupRequest $request, int $id): SuccessResource
    {

        $data = AccountGroupFacade::update($request->validated(), $id);
        return new AccountGroupResource($data, $message = 'AccountGroup updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {

        $result = AccountGroupFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'AccountGroup deleted successfully' : 'AccountGroup not found',
        ]);
    }






    public function current_liability_groups(): SuccessCollection
    {

        $data = $this->service->getCurrentLiabilityGroups();

        return new AccountGroupCollection($data);
    }
}
