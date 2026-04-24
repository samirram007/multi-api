<?php

namespace App\Modules\Hotel\Amenities\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\Hotel\Amenities\Resources\AmenitiesResource;
use App\Modules\Hotel\Amenities\Resources\AmenitiesCollection;
use App\Modules\Hotel\Amenities\Requests\AmenitiesRequest;
use App\Modules\Hotel\Amenities\Facades\AmenitiesFacade as Amenities;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class AmenitiesController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Amenities::getAll();
        return new AmenitiesCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Amenities::getById($id);
        return  new AmenitiesResource($data);
    }

    public function store(AmenitiesRequest $request): SuccessResource
    {
        $data = Amenities::store($request->validated());
       return  new AmenitiesResource($data, $messages='Amenities created successfully');
    }

    public function update(AmenitiesRequest $request, int $id): SuccessResource
    {
        $data = Amenities::update($request->validated(), $id);
        return  new AmenitiesResource($data, $messages='Amenities updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Amenities::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Amenities deleted successfully':'Amenities not found',
        ]);
    }
}
