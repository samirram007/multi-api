<?php

namespace App\Modules\Document\Document\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SuccessCollection;
use App\Http\Resources\SuccessResource;
use App\Modules\Document\Document\Facades\DocumentFacade;
use App\Modules\Document\Document\Requests\CreateFolderRequest;
use App\Modules\Document\Document\Requests\DocumentRequest;
use App\Modules\Document\Document\Resources\DocumentCollection;
use App\Modules\Document\Document\Resources\DocumentResource;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class DocumentController extends Controller
{
    use ApiResponseTrait;

    /*
    |--------------------------------------------------------------------------
    | List
    |--------------------------------------------------------------------------
    */

    public function index(): DocumentCollection
    {
        return new DocumentCollection(
            DocumentFacade::getAll()
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Store (Upload)
    |--------------------------------------------------------------------------
    */

    public function store(DocumentRequest $request): JsonResponse
    {



        $documents = DocumentFacade::store($request->validated());

        return response()->json([
            'status' => true,
            'success' => true,
            'message' => 'Document(s) uploaded successfully',
            'data' => DocumentResource::collection($documents),
        ], Response::HTTP_CREATED);
    }

    /*
    |--------------------------------------------------------------------------
    | Show Single
    |--------------------------------------------------------------------------
    */

    public function show(int $id): JsonResponse
    {
        $document = DocumentFacade::find($id);

        if (!$document) {
            return response()->json([
                'message' => 'Document not found',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => true,
            'data' => new DocumentResource($document),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(DocumentRequest $request, int $id): JsonResponse
    {
        $document = DocumentFacade::update($id, $request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Document updated successfully',
            'data' => new DocumentResource($document),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */

    public function destroy(int $id): JsonResponse
    {
        $deleted = DocumentFacade::delete($id);

        if (!$deleted) {
            return response()->json([
                'message' => 'Document not found',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    /*
    |--------------------------------------------------------------------------
    | Bulk Delete
    |--------------------------------------------------------------------------
    */

    public function bulkDelete(Request $request): JsonResponse
    {
        $ids = $request->input('ids', []);

        $count = DocumentFacade::bulkDelete($ids);

        return response()->json([
            'status' => true,
            'message' => "{$count} document(s) deleted successfully",
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Download File
    |--------------------------------------------------------------------------
    */

    public function download(int $id)
    {
        return DocumentFacade::getFile($id);
    }

    /*
    |--------------------------------------------------------------------------
    | Tree Navigation
    |--------------------------------------------------------------------------
    */

    public function root(): JsonResponse
    {
        return response()->json([
            'data' => DocumentResource::collection(
                DocumentFacade::getRoot()
            ),
        ]);
    }

    public function children(int $id): SuccessCollection
    {
        return new DocumentCollection(
            DocumentFacade::getChildren($id)
        );
    }

    public function path(int $id): SuccessCollection
    {
        return new DocumentCollection(
            DocumentFacade::getPath($id)
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Folder Operations
    |--------------------------------------------------------------------------
    */

    public function createFolder(CreateFolderRequest $request): SuccessResource
    {
        $folder = DocumentFacade::createFolder($request->all());

        return new DocumentResource($folder);
    }

    public function move(Request $request, int $id): JsonResponse
    {
        DocumentFacade::move($id, $request->input('parent_id'));

        return response()->json([
            'status' => true,
            'message' => 'Document moved successfully',
        ]);
    }

    public function rename(Request $request, int $id): JsonResponse
    {
        DocumentFacade::rename($id, $request->input('name'));

        return response()->json([
            'status' => true,
            'message' => 'Document renamed successfully',
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Search / Filter
    |--------------------------------------------------------------------------
    */

    public function search(Request $request): JsonResponse
    {
        $results = DocumentFacade::search($request->input('query', ''));

        return response()->json([
            'data' => DocumentResource::collection($results),
        ]);
    }

    public function getByType(string $type): JsonResponse
    {
        $documents = DocumentFacade::getByType($type);

        return response()->json([
            'data' => DocumentResource::collection($documents),
        ]);
    }
}
