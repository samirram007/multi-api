<?php

namespace Modules\School\Book\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\School\Book\Resources\BookResource;
use Modules\School\Book\Resources\BookCollection;
use Modules\School\Book\Requests\BookRequest;
use Modules\School\Book\Facades\BookFacade as Book;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Book::getAll();
        return new BookCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Book::getById($id);
        return  new BookResource($data);
    }

    public function store(BookRequest $request): SuccessResource
    {
        $data = Book::store($request->validated());
       return  new BookResource($data, $messages='Book created successfully');
    }

    public function update(BookRequest $request, int $id): SuccessResource
    {
        $data = Book::update($request->validated(), $id);
        return  new BookResource($data, $messages='Book updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Book::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Book deleted successfully':'Book not found',
        ]);
    }
}
