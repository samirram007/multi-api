<?php

namespace Modules\Base\Address\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Base\Address\Facades\AddressFacade;
use Modules\Base\Address\Resources\AddressResource;
use Modules\Base\Address\Resources\AddressCollection;
use Modules\Base\Address\Requests\AddressRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    }

    public function index(): SuccessCollection
    {
        $data = AddressFacade::getAll();
        return new AddressCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = AddressFacade::getById($id);
        return new AddressResource($data);
    }

    public function store(AddressRequest $request): SuccessResource
    {
        $data = AddressFacade::store($request->validated());
        return new AddressResource($data, $messages = 'Address created successfully');
    }

    public function update(AddressRequest $request, int $id): SuccessResource
    {
        $data = AddressFacade::update($request->validated(), $id);
        return new AddressResource($data, $messages = 'Address updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {

        $result = AddressFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'Address deleted successfully' : 'Address not found',
        ]);
    }
}
