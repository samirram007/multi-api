<?php

namespace Modules\App\Agent\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\App\Agent\Resources\AgentResource;
use Modules\App\Agent\Resources\AgentCollection;
use Modules\App\Agent\Requests\AgentRequest;
use Modules\App\Agent\Facades\AgentFacade as Agent;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class AgentController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Agent::getAll();
        return new AgentCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Agent::getById($id);
        return  new AgentResource($data);
    }

    public function store(AgentRequest $request): SuccessResource
    {
        $data = Agent::store($request->validated());
       return  new AgentResource($data, $messages='Agent created successfully');
    }

    public function update(AgentRequest $request, int $id): SuccessResource
    {
        $data = Agent::update($request->validated(), $id);
        return  new AgentResource($data, $messages='Agent updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Agent::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Agent deleted successfully':'Agent not found',
        ]);
    }
}
