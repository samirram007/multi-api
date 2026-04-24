<?php

namespace App\Modules\School\Building\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\Building\Resources\BuildingResource;
use App\Modules\School\Building\Resources\BuildingCollection;
use App\Modules\School\Building\Requests\BuildingRequest;
use App\Modules\School\Building\Facades\BuildingFacade as Building;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class BuildingController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Building::getAll();
        return new BuildingCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Building::getById($id);
        return  new BuildingResource($data);
    }

    public function store(BuildingRequest $request): SuccessResource
    {
        $data = Building::store($request->validated());
       return  new BuildingResource($data, $messages='Building created successfully');
    }

    public function update(BuildingRequest $request, int $id): SuccessResource
    {
        $data = Building::update($request->validated(), $id);
        return  new BuildingResource($data, $messages='Building updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Building::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Building deleted successfully':'Building not found',
        ]);
    }
}
