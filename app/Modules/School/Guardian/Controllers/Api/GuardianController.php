<?php

namespace App\Modules\School\Guardian\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\Guardian\Resources\GuardianResource;
use App\Modules\School\Guardian\Resources\GuardianCollection;
use App\Modules\School\Guardian\Requests\GuardianRequest;
use App\Modules\School\Guardian\Facades\GuardianFacade as Guardian;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class GuardianController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Guardian::getAll();
        return new GuardianCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Guardian::getById($id);
        return  new GuardianResource($data);
    }

    public function store(GuardianRequest $request): SuccessResource
    {
        $data = Guardian::store($request->validated());
       return  new GuardianResource($data, $messages='Guardian created successfully');
    }

    public function update(GuardianRequest $request, int $id): SuccessResource
    {
        $data = Guardian::update($request->validated(), $id);
        return  new GuardianResource($data, $messages='Guardian updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Guardian::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Guardian deleted successfully':'Guardian not found',
        ]);
    }
}
