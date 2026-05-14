<?php

namespace Modules\Aipt\GstRegistrationType\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Aipt\GstRegistrationType\Facades\GstRegistrationTypeFacade;
use Modules\Aipt\GstRegistrationType\Resources\GstRegistrationTypeResource;
use Modules\Aipt\GstRegistrationType\Resources\GstRegistrationTypeCollection;
use Modules\Aipt\GstRegistrationType\Requests\GstRegistrationTypeRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class GstRegistrationTypeController extends Controller
{
    use ApiResponseTrait;

    public function index(): GstRegistrationTypeCollection
    {
        $data = GstRegistrationTypeFacade::getAll();
        return new GstRegistrationTypeCollection($data);
    }

    public function show(int $id): GstRegistrationTypeResource
    {
        $data = GstRegistrationTypeFacade::getById($id);
        return  new GstRegistrationTypeResource($data);
    }

    public function store(GstRegistrationTypeRequest $request): GstRegistrationTypeResource
    {
        $data = GstRegistrationTypeFacade::store($request->validated());
       return  new GstRegistrationTypeResource($data, $messages='GstRegistrationType created successfully');
    }

    public function update(GstRegistrationTypeRequest $request, int $id): GstRegistrationTypeResource
    {
        $data = GstRegistrationTypeFacade::update($request->validated(), $id);
        return  new GstRegistrationTypeResource($data, $messages='GstRegistrationType updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=GstRegistrationTypeFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'GstRegistrationType deleted successfully':'GstRegistrationType not found',
        ]);
    }
}
