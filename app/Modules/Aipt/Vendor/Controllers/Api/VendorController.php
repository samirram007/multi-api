<?php

namespace Modules\Aipt\Vendor\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Aipt\Vendor\Contracts\VendorServiceInterface;
use Modules\Aipt\Vendor\Resources\VendorResource;
use Modules\Aipt\Vendor\Resources\VendorCollection;
use Modules\Aipt\Vendor\Requests\VendorRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class VendorController extends Controller
{
    use ApiResponseTrait;

    public function __construct(protected VendorServiceInterface $service) {}

    public function index(): SuccessCollection
    {
        $data = $this->service->getAll();
        return new VendorCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = $this->service->getById($id);
        return  new VendorResource($data);
    }

    public function store(VendorRequest $request): SuccessResource
    {
        $data = $this->service->store($request->validated());
       return  new VendorResource($data, $messages='Vendor created successfully');
    }

    public function update(VendorRequest $request, int $id): SuccessResource
    {
        $data = $this->service->update($request->validated(), $id);
        return  new VendorResource($data, $messages='Vendor updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=$this->service->delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Vendor deleted successfully':'Vendor not found',
        ]);
    }
}
