<?php

namespace App\Modules\WorkerMod\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\WorkerMod\Resources\WorkerModResource;
use App\Modules\WorkerMod\Resources\WorkerModCollection;
use App\Modules\WorkerMod\Requests\WorkerModRequest;
use App\Modules\WorkerMod\Facades\WorkerModFacade as WorkerMod;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class WorkerModController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = WorkerMod::getAll();
        return new WorkerModCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = WorkerMod::getById($id);
        return  new WorkerModResource($data);
    }

    public function store(WorkerModRequest $request): SuccessResource
    {
        $data = WorkerMod::store($request->validated());
       return  new WorkerModResource($data, $messages='WorkerMod created successfully');
    }

    public function update(WorkerModRequest $request, int $id): SuccessResource
    {
        $data = WorkerMod::update($request->validated(), $id);
        return  new WorkerModResource($data, $messages='WorkerMod updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=WorkerMod::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'WorkerMod deleted successfully':'WorkerMod not found',
        ]);
    }
}
