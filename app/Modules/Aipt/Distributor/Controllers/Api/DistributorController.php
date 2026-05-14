<?php

namespace Modules\Aipt\Distributor\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Aipt\Distributor\Facades\DistributorFacade;
use Modules\Aipt\Distributor\Resources\DistributorResource;
use Modules\Aipt\Distributor\Resources\DistributorCollection;
use Modules\Aipt\Distributor\Requests\DistributorRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class DistributorController extends Controller
{
    use ApiResponseTrait;

    public function index(): DistributorCollection
    {
        $data = DistributorFacade::getAll();
        return new DistributorCollection($data);
    }

    public function show(int $id): DistributorResource
    {
        $data = DistributorFacade::getById($id);
        return new DistributorResource($data);
    }

    public function store(DistributorRequest $request): DistributorResource
    {
        $data = DistributorFacade::store($request->validated());
        return new DistributorResource($data, $messages = 'Distributor created successfully');
    }

    public function update(DistributorRequest $request, int $id): DistributorResource
    {
        // dd($request->validated());
        $data = DistributorFacade::update($request->validated(), $id);
        return new DistributorResource($data, $messages = 'Distributor updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {

        $result = DistributorFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'Distributor deleted successfully' : 'Distributor not found',
        ]);
    }
}
