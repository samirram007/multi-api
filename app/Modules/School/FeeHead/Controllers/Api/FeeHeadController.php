<?php

namespace Modules\School\FeeHead\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\School\FeeHead\Resources\FeeHeadResource;
use Modules\School\FeeHead\Resources\FeeHeadCollection;
use Modules\School\FeeHead\Requests\FeeHeadRequest;
use Modules\School\FeeHead\Facades\FeeHeadFacade as FeeHead;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class FeeHeadController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = FeeHead::getAll();
        return new FeeHeadCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = FeeHead::getById($id);
        return  new FeeHeadResource($data);
    }

    public function store(FeeHeadRequest $request): SuccessResource
    {
        $data = FeeHead::store($request->validated());
       return  new FeeHeadResource($data, $messages='FeeHead created successfully');
    }

    public function update(FeeHeadRequest $request, int $id): SuccessResource
    {
        $data = FeeHead::update($request->validated(), $id);
        return  new FeeHeadResource($data, $messages='FeeHead updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=FeeHead::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'FeeHead deleted successfully':'FeeHead not found',
        ]);
    }
}
