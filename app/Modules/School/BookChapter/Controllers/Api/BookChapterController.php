<?php

namespace Modules\School\BookChapter\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\School\BookChapter\Resources\BookChapterResource;
use Modules\School\BookChapter\Resources\BookChapterCollection;
use Modules\School\BookChapter\Requests\BookChapterRequest;
use Modules\School\BookChapter\Facades\BookChapterFacade as BookChapter;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class BookChapterController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = BookChapter::getAll();
        return new BookChapterCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = BookChapter::getById($id);
        return  new BookChapterResource($data);
    }

    public function store(BookChapterRequest $request): SuccessResource
    {
        $data = BookChapter::store($request->validated());
       return  new BookChapterResource($data, $messages='BookChapter created successfully');
    }

    public function update(BookChapterRequest $request, int $id): SuccessResource
    {
        $data = BookChapter::update($request->validated(), $id);
        return  new BookChapterResource($data, $messages='BookChapter updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=BookChapter::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'BookChapter deleted successfully':'BookChapter not found',
        ]);
    }
}
