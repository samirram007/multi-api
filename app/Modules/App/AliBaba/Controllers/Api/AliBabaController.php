<?php

namespace Modules\App\AliBaba\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\App\AliBaba\Resources\AliBabaResource;
use Modules\App\AliBaba\Resources\AliBabaCollection;
use Modules\App\AliBaba\Requests\AliBabaRequest;
use Modules\App\AliBaba\Facades\AliBabaFacade as AliBabaFacade;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;

class AliBabaController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = AliBabaFacade::getAll();
        return new AliBabaCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = AliBabaFacade::getById($id);
        return new AliBabaResource($data);
    }

    public function store(AliBabaRequest $request): SuccessResource
    {
        $data = AliBabaFacade::store($request->validated());
        return new AliBabaResource($data, 'AliBaba created successfully');
    }

    public function update(AliBabaRequest $request, int $id): SuccessResource
    {
        $data = AliBabaFacade::update($request->validated(), $id);
        return new AliBabaResource($data, 'AliBaba updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {
        $result = AliBabaFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'AliBaba deleted successfully' : 'AliBaba not found',
        ]);
    }
}
