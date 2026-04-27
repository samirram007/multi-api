<?php

namespace Modules\Help\TopicCategory\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Help\TopicCategory\Contracts\TopicCategoryServiceInterface;
use Modules\Help\TopicCategory\Resources\TopicCategoryResource;
use Modules\Help\TopicCategory\Resources\TopicCategoryCollection;
use Modules\Help\TopicCategory\Requests\TopicCategoryRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class TopicCategoryController extends Controller
{
    use ApiResponseTrait;

    public function __construct(protected TopicCategoryServiceInterface $service)
    {
    }

    public function index(): SuccessCollection
    {
        $data = $this->service->getAll();
        return new TopicCategoryCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = $this->service->getById($id);
        return new TopicCategoryResource($data);
    }
    public function getBySlug(string $slug): SuccessResource
    {
        $data = $this->service->getBySlug($slug);
        return new TopicCategoryResource($data);
    }

    public function store(TopicCategoryRequest $request): SuccessResource
    {
        //dd($request->all());
        $data = $this->service->store($request->validated());
        return new TopicCategoryResource($data, $messages = 'TopicCategory created successfully');
    }

    public function update(TopicCategoryRequest $request, int $id): SuccessResource
    {
        $data = $this->service->update($request->validated(), $id);
        return new TopicCategoryResource($data, $messages = 'TopicCategory updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {

        $result = $this->service->delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'TopicCategory deleted successfully' : 'TopicCategory not found',
        ]);
    }
}
