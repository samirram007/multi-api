<?php

namespace App\Modules\Worker\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\Worker\Resources\WorkerResource;
use App\Modules\Worker\Resources\WorkerCollection;
use App\Modules\Worker\Requests\WorkerRequest;
use App\Modules\Worker\Facades\WorkerFacade as Worker;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class WorkerController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Worker::getAll();
        return new WorkerCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Worker::getById($id);
        return  new WorkerResource($data);
    }

    public function store(WorkerRequest $request): SuccessResource
    {
        $data = Worker::store($request->validated());
       return  new WorkerResource($data, $messages='Worker created successfully');
    }

    public function update(WorkerRequest $request, int $id): SuccessResource
    {
        $data = Worker::update($request->validated(), $id);
        return  new WorkerResource($data, $messages='Worker updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Worker::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Worker deleted successfully':'Worker not found',
        ]);
    }
}
