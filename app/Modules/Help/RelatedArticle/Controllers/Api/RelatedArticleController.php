<?php

namespace Modules\Help\RelatedArticle\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Help\RelatedArticle\Contracts\RelatedArticleServiceInterface;
use Modules\Help\RelatedArticle\Resources\RelatedArticleResource;
use Modules\Help\RelatedArticle\Resources\RelatedArticleCollection;
use Modules\Help\RelatedArticle\Requests\RelatedArticleRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class RelatedArticleController extends Controller
{
    use ApiResponseTrait;

    public function __construct(protected RelatedArticleServiceInterface $service) {}

    public function index(): SuccessCollection
    {
        $data = $this->service->getAll();
        return new RelatedArticleCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = $this->service->getById($id);
        return  new RelatedArticleResource($data);
    }

    public function store(RelatedArticleRequest $request): SuccessResource
    {
        $data = $this->service->store($request->validated());
       return  new RelatedArticleResource($data, $messages='RelatedArticle created successfully');
    }

    public function update(RelatedArticleRequest $request, int $id): SuccessResource
    {
        $data = $this->service->update($request->validated(), $id);
        return  new RelatedArticleResource($data, $messages='RelatedArticle updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=$this->service->delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'RelatedArticle deleted successfully':'RelatedArticle not found',
        ]);
    }
}
