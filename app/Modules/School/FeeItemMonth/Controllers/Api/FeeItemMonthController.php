<?php

namespace App\Modules\School\FeeItemMonth\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\FeeItemMonth\Resources\FeeItemMonthResource;
use App\Modules\School\FeeItemMonth\Resources\FeeItemMonthCollection;
use App\Modules\School\FeeItemMonth\Requests\FeeItemMonthRequest;
use App\Modules\School\FeeItemMonth\Facades\FeeItemMonthFacade as FeeItemMonth;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class FeeItemMonthController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = FeeItemMonth::getAll();
        return new FeeItemMonthCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = FeeItemMonth::getById($id);
        return  new FeeItemMonthResource($data);
    }

    public function store(FeeItemMonthRequest $request): SuccessResource
    {
        $data = FeeItemMonth::store($request->validated());
       return  new FeeItemMonthResource($data, $messages='FeeItemMonth created successfully');
    }

    public function update(FeeItemMonthRequest $request, int $id): SuccessResource
    {
        $data = FeeItemMonth::update($request->validated(), $id);
        return  new FeeItemMonthResource($data, $messages='FeeItemMonth updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=FeeItemMonth::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'FeeItemMonth deleted successfully':'FeeItemMonth not found',
        ]);
    }
}
