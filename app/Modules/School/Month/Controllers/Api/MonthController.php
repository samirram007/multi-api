<?php

namespace Modules\School\Month\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\School\Month\Resources\MonthResource;
use Modules\School\Month\Resources\MonthCollection;
use Modules\School\Month\Requests\MonthRequest;
use Modules\School\Month\Facades\MonthFacade as Month;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class MonthController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Month::getAll();
        return new MonthCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Month::getById($id);
        return  new MonthResource($data);
    }

    public function store(MonthRequest $request): SuccessResource
    {
        $data = Month::store($request->validated());
       return  new MonthResource($data, $messages='Month created successfully');
    }

    public function update(MonthRequest $request, int $id): SuccessResource
    {
        $data = Month::update($request->validated(), $id);
        return  new MonthResource($data, $messages='Month updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Month::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Month deleted successfully':'Month not found',
        ]);
    }
}
