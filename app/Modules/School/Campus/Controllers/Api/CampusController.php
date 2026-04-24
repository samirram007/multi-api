<?php

namespace App\Modules\School\Campus\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\Campus\Resources\CampusResource;
use App\Modules\School\Campus\Resources\CampusCollection;
use App\Modules\School\Campus\Requests\CampusRequest;
use App\Modules\School\Campus\Facades\CampusFacade as Campus;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class CampusController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Campus::getAll();
        return new CampusCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Campus::getById($id);
        return  new CampusResource($data);
    }

    public function store(CampusRequest $request): SuccessResource
    {
        $data = Campus::store($request->validated());
       return  new CampusResource($data, $messages='Campus created successfully');
    }

    public function update(CampusRequest $request, int $id): SuccessResource
    {
        $data = Campus::update($request->validated(), $id);
        return  new CampusResource($data, $messages='Campus updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Campus::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Campus deleted successfully':'Campus not found',
        ]);
    }
}
