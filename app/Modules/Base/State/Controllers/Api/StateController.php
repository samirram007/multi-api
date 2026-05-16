<?php

namespace Modules\Base\State\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Base\State\Facades\StateFacade as State;
use Modules\Base\State\Resources\StateResource;
use Modules\Base\State\Resources\StateCollection;
use Modules\Base\State\Requests\StateRequest;
use App\Http\Resources\SuccessResource;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class StateController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    }

    public function index(): StateCollection
    {
        $data = State::getAll();
        return new StateCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = State::getById($id);
        return new SuccessResource($data, $messages = 'State retrieved successfully');
    }

    public function store(StateRequest $request): SuccessResource
    {
        $data = State::store($request->validated());

        return new SuccessResource($data, $messages = 'State created successfully');
    }

    public function update(StateRequest $request, int $id): SuccessResource
    {
        $data = State::update($request->validated(), $id);

        return new SuccessResource($data, $messages = 'State updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {
        $result = State::delete($id);

        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'State deleted successfully' : 'State not found',
        ]);
    }
}
