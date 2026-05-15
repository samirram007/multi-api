<?php

namespace Modules\School\BookModule\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\School\BookModule\Resources\BookModuleResource;
use Modules\School\BookModule\Resources\BookModuleCollection;
use Modules\School\BookModule\Requests\BookModuleRequest;
use Modules\School\BookModule\Facades\BookModuleFacade as BookModule;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class BookModuleController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = BookModule::getAll();
        return new BookModuleCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = BookModule::getById($id);
        return  new BookModuleResource($data);
    }

    public function store(BookModuleRequest $request): SuccessResource
    {
        $data = BookModule::store($request->validated());
       return  new BookModuleResource($data, $messages='BookModule created successfully');
    }

    public function update(BookModuleRequest $request, int $id): SuccessResource
    {
        $data = BookModule::update($request->validated(), $id);
        return  new BookModuleResource($data, $messages='BookModule updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=BookModule::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'BookModule deleted successfully':'BookModule not found',
        ]);
    }
}
