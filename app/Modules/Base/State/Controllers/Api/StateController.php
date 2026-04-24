<?php

namespace App\Modules\Base\State\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Base\State\Facades\StateFacade as State;
use App\Modules\Base\State\Resources\StateResource;
use App\Modules\Base\State\Resources\StateCollection;
use App\Modules\Base\State\Requests\StateRequest;
use App\Http\Resources\SuccessResource;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class StateController extends Controller
{
    use ApiResponseTrait;



    public function index(): StateCollection
    {
        // Use cache for all states
        $data = State::getAll();
        return new StateCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        // Use cache for single state
        $data = Cache::rememberForever("state_{$id}", function () use ($id) {
            return State::getById($id);
        });
        return new StateResource($data, $messages = 'State retrieved successfully');
    }

    public function store(StateRequest $request): SuccessResource
    {
        $data = State::store($request->validated());
        // Clear state cache after create
        Cache::forget('states_all');
        if ($data && isset($data->id)) {
            Cache::forget("state_{$data->id}");
        }
        return new StateResource($data, $messages = 'State created successfully');
    }

    public function update(StateRequest $request, int $id): SuccessResource
    {
        $data = State::update($request->validated(), $id);
        // Clear state cache after update
        Cache::forget('states_all');
        Cache::forget("state_{$id}");
        return new StateResource($data, $messages = 'State updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {
        $result = State::delete($id);
        // Clear state cache after delete
        Cache::forget('states_all');
        Cache::forget("state_{$id}");
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'State deleted successfully' : 'State not found',
        ]);
    }
}
