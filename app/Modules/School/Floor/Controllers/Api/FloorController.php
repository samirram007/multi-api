<?php

namespace App\Modules\School\Floor\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\Floor\Resources\FloorResource;
use App\Modules\School\Floor\Resources\FloorCollection;
use App\Modules\School\Floor\Requests\FloorRequest;
use App\Modules\School\Floor\Facades\FloorFacade as Floor;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class FloorController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Floor::getAll();
        return new FloorCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Floor::getById($id);
        return  new FloorResource($data);
    }

    public function store(FloorRequest $request): SuccessResource
    {
        $data = Floor::store($request->validated());
       return  new FloorResource($data, $messages='Floor created successfully');
    }

    public function update(FloorRequest $request, int $id): SuccessResource
    {
        $data = Floor::update($request->validated(), $id);
        return  new FloorResource($data, $messages='Floor updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Floor::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Floor deleted successfully':'Floor not found',
        ]);
    }
}
