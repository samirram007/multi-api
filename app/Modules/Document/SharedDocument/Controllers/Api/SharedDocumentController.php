<?php

namespace App\Modules\Document\SharedDocument\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Document\SharedDocument\Contracts\SharedDocumentServiceInterface;
use App\Modules\Document\SharedDocument\Resources\SharedDocumentResource;
use App\Modules\Document\SharedDocument\Resources\SharedDocumentCollection;
use App\Modules\Document\SharedDocument\Requests\SharedDocumentRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class SharedDocumentController extends Controller
{
    use ApiResponseTrait;

    public function __construct(protected SharedDocumentServiceInterface $service)
    {
    }

    public function index(): SuccessCollection
    {
        $data = $this->service->getAll();
        return new SharedDocumentCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = $this->service->getById($id);
        return new SharedDocumentResource($data);
    }

    public function store(SharedDocumentRequest $request): SuccessResource
    {
        $data = $this->service->store($request->validated());
        return new SharedDocumentResource($data, $messages = 'SharedDocument created successfully');
    }

    public function update(SharedDocumentRequest $request, int $id): SuccessResource
    {
        $data = $this->service->update($request->validated(), $id);
        return new SharedDocumentResource($data, $messages = 'SharedDocument updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {

        $result = $this->service->delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'SharedDocument deleted successfully' : 'SharedDocument not found',
        ]);
    }
}
