<?php

namespace App\Modules\Maintenance\Restore\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\Maintenance\Restore\Resources\RestoreResource;
use App\Modules\Maintenance\Restore\Resources\RestoreCollection;
use App\Modules\Maintenance\Restore\Requests\RestoreRequest;
use App\Modules\Maintenance\Restore\Facades\RestoreFacade as Restore;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class RestoreController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Restore::getAll();
        return new RestoreCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Restore::getById($id);
        return  new RestoreResource($data);
    }

    public function store(RestoreRequest $request): SuccessResource
    {
        $data = Restore::store($request->validated());
       return  new RestoreResource($data, $messages='Restore created successfully');
    }

    public function update(RestoreRequest $request, int $id): SuccessResource
    {
        $data = Restore::update($request->validated(), $id);
        return  new RestoreResource($data, $messages='Restore updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Restore::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Restore deleted successfully':'Restore not found',
        ]);
    }
}
