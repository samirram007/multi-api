<?php

namespace App\Modules\School\Fee\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\Fee\Resources\FeeResource;
use App\Modules\School\Fee\Resources\FeeCollection;
use App\Modules\School\Fee\Requests\FeeRequest;
use App\Modules\School\Fee\Facades\FeeFacade as Fee;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class FeeController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Fee::getAll();
        return new FeeCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Fee::getById($id);
        return  new FeeResource($data);
    }

    public function store(FeeRequest $request): SuccessResource
    {
        $data = Fee::store($request->validated());
       return  new FeeResource($data, $messages='Fee created successfully');
    }

    public function update(FeeRequest $request, int $id): SuccessResource
    {
        $data = Fee::update($request->validated(), $id);
        return  new FeeResource($data, $messages='Fee updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Fee::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Fee deleted successfully':'Fee not found',
        ]);
    }
}
