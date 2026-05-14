<?php

namespace Modules\Aipt\Customer\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Aipt\Customer\Facades\CustomerFacade;
use Modules\Aipt\Customer\Resources\CustomerResource;
use Modules\Aipt\Customer\Resources\CustomerCollection;
use Modules\Aipt\Customer\Requests\CustomerRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    use ApiResponseTrait;

    public function index(): CustomerCollection
    {
        $data = CustomerFacade::getAll();
        return new CustomerCollection($data);
    }

    public function show(int $id): CustomerResource
    {
        $data = CustomerFacade::getById($id);
        return new CustomerResource($data, 'Customer retrieved successfully');
    }

    public function store(CustomerRequest $request): CustomerResource
    {
        $data = CustomerFacade::store($request->validated());
        return new CustomerResource($data, 'Customer created successfully');
    }

    public function update(CustomerRequest $request, int $id): CustomerResource
    {
        $data = CustomerFacade::update($request->validated(), $id);
        return new CustomerResource($data, 'Customer updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {
        $result = CustomerFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'Customer deleted successfully' : 'Customer not found',
        ]);
    }
}
