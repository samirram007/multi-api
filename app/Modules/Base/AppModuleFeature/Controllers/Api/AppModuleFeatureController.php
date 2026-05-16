<?php

namespace Modules\Base\AppModuleFeature\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Base\AppModuleFeature\Facades\AppModuleFeatureFacade;
use Modules\Base\AppModuleFeature\Resources\AppModuleFeatureResource;
use Modules\Base\AppModuleFeature\Resources\AppModuleFeatureCollection;
use Modules\Base\AppModuleFeature\Requests\AppModuleFeatureRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class AppModuleFeatureController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    }

    public function index(): SuccessCollection
    {
        $data = AppModuleFeatureFacade::getAll();
        return new AppModuleFeatureCollection($data);
    }


    public function show(int $id): SuccessResource
    {
        $data = AppModuleFeatureFacade::getById($id);
        return new AppModuleFeatureResource($data);
    }

    public function store(AppModuleFeatureRequest $request): SuccessResource
    {
        $data = AppModuleFeatureFacade::store($request->validated());
        return new AppModuleFeatureResource($data, $messages = 'AppModuleFeature created successfully');
    }

    public function update(AppModuleFeatureRequest $request, int $id): SuccessResource
    {
        $data = AppModuleFeatureFacade::update($request->validated(), $id);
        return new AppModuleFeatureResource($data, $messages = 'AppModuleFeature updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {

        $result = AppModuleFeatureFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'AppModuleFeature deleted successfully' : 'AppModuleFeature not found',
        ]);
    }

    public function getModuleFeaturesByRole(int $role_id, int $module_id): SuccessCollection
    {
        $data = AppModuleFeatureFacade::getByRoleAndModule($role_id, $module_id);
        //dd($data);
        return new AppModuleFeatureCollection($data);
    }
}
