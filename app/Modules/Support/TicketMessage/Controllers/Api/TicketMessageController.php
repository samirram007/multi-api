<?php

namespace Modules\Support\TicketMessage\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Support\TicketMessage\Contracts\TicketMessageServiceInterface;
use Modules\Support\TicketMessage\Resources\TicketMessageResource;
use Modules\Support\TicketMessage\Resources\TicketMessageCollection;
use Modules\Support\TicketMessage\Requests\TicketMessageRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class TicketMessageController extends Controller
{
    use ApiResponseTrait;

    public function __construct(protected TicketMessageServiceInterface $service) {}

    public function index(): SuccessCollection
    {
        $data = $this->service->getAll();
        return new TicketMessageCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = $this->service->getById($id);
        return  new TicketMessageResource($data);
    }

    public function store(TicketMessageRequest $request): SuccessResource
    {
        $data = $this->service->store($request->validated());
       return  new TicketMessageResource($data, $messages='TicketMessage created successfully');
    }

    public function update(TicketMessageRequest $request, int $id): SuccessResource
    {
        $data = $this->service->update($request->validated(), $id);
        return  new TicketMessageResource($data, $messages='TicketMessage updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=$this->service->delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'TicketMessage deleted successfully':'TicketMessage not found',
        ]);
    }
}
