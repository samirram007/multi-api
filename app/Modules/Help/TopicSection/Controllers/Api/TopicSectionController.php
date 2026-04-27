<?php

namespace Modules\Help\TopicSection\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Help\TopicSection\Contracts\TopicSectionServiceInterface;
use Modules\Help\TopicSection\Resources\TopicSectionResource;
use Modules\Help\TopicSection\Resources\TopicSectionCollection;
use Modules\Help\TopicSection\Requests\TopicSectionRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class TopicSectionController extends Controller
{
    use ApiResponseTrait;

    public function __construct(protected TopicSectionServiceInterface $service) {}

    public function index(): SuccessCollection
    {
        $data = $this->service->getAll();
        return new TopicSectionCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = $this->service->getById($id);
        return  new TopicSectionResource($data);
    }
    public function getBySlug(string $slug): SuccessResource
    {
        $data = $this->service->getBySlug($slug);
        return  new TopicSectionResource($data);
    }

    public function store(TopicSectionRequest $request): SuccessResource
    {
        $data = $this->service->store($request->validated());
       return  new TopicSectionResource($data, $messages='TopicSection created successfully');
    }

    public function update(TopicSectionRequest $request, int $id): SuccessResource
    {
        $data = $this->service->update($request->validated(), $id);
        return  new TopicSectionResource($data, $messages='TopicSection updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=$this->service->delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'TopicSection deleted successfully':'TopicSection not found',
        ]);
    }
}
