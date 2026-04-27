<?php

namespace Modules\App\App\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\App\App\Resources\AppResource;
use Modules\App\App\Resources\AppCollection;
use Modules\App\App\Requests\AppRequest;
use Modules\App\App\Facades\AppFacade as App;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class AppController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = App::getAll();
        return new AppCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = App::getById($id);
        return  new AppResource($data);
    }

    public function store(AppRequest $request): SuccessResource
    {
        $data = App::store($request->validated());
       return  new AppResource($data, $messages='App created successfully');
    }

    public function update(AppRequest $request, int $id): SuccessResource
    {
        $data = App::update($request->validated(), $id);
        return  new AppResource($data, $messages='App updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=App::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'App deleted successfully':'App not found',
        ]);
    }
}
