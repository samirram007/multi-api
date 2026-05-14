<?php

namespace Modules\Aipt\HsnSacCode\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Aipt\HsnSacCode\Facades\HsnSacCodeFacade;
use Modules\Aipt\HsnSacCode\Resources\HsnSacCodeResource;
use Modules\Aipt\HsnSacCode\Resources\HsnSacCodeCollection;
use Modules\Aipt\HsnSacCode\Requests\HsnSacCodeRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class HsnSacCodeController extends Controller
{
    use ApiResponseTrait;

    public function index(): HsnSacCodeCollection
    {
        $data = HsnSacCodeFacade::getAll();
        return new HsnSacCodeCollection($data);
    }

    public function show(int $id): HsnSacCodeResource
    {
        $data = HsnSacCodeFacade::getById($id);
        return  new HsnSacCodeResource($data);
    }

    public function store(HsnSacCodeRequest $request): HsnSacCodeResource
    {
        $data = HsnSacCodeFacade::store($request->validated());
       return  new HsnSacCodeResource($data, $messages='HsnSacCode created successfully');
    }

    public function update(HsnSacCodeRequest $request, int $id): HsnSacCodeResource
    {
        $data = HsnSacCodeFacade::update($request->validated(), $id);
        return  new HsnSacCodeResource($data, $messages='HsnSacCode updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=HsnSacCodeFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'HsnSacCode deleted successfully':'HsnSacCode not found',
        ]);
    }
}
