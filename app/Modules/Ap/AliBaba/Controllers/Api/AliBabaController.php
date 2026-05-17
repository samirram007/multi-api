<?php

namespace Modules\Ap\AliBaba\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\Ap\AliBaba\Resources\AliBabaResource;
use Modules\Ap\AliBaba\Resources\AliBabaCollection;
use Modules\Ap\AliBaba\Requests\AliBabaRequest;
use Modules\Ap\AliBaba\Facades\AliBabaFacade as AliBaba;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class AliBabaController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = AliBaba::getAll();
        return new AliBabaCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = AliBaba::getById($id);
        return  new AliBabaResource($data);
    }

    public function store(AliBabaRequest $request): SuccessResource
    {
        $data = AliBaba::store($request->validated());
       return  new AliBabaResource($data, $messages='AliBaba created successfully');
    }

    public function update(AliBabaRequest $request, int $id): SuccessResource
    {
        $data = AliBaba::update($request->validated(), $id);
        return  new AliBabaResource($data, $messages='AliBaba updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=AliBaba::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'AliBaba deleted successfully':'AliBaba not found',
        ]);
    }
}
