<?php

namespace App\Modules\School\FeeTemplate\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\FeeTemplate\Resources\FeeTemplateResource;
use App\Modules\School\FeeTemplate\Resources\FeeTemplateCollection;
use App\Modules\School\FeeTemplate\Requests\FeeTemplateRequest;
use App\Modules\School\FeeTemplate\Facades\FeeTemplateFacade as FeeTemplate;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class FeeTemplateController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = FeeTemplate::getAll();
        return new FeeTemplateCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = FeeTemplate::getById($id);
        return  new FeeTemplateResource($data);
    }

    public function store(FeeTemplateRequest $request): SuccessResource
    {
        $data = FeeTemplate::store($request->validated());
       return  new FeeTemplateResource($data, $messages='FeeTemplate created successfully');
    }

    public function update(FeeTemplateRequest $request, int $id): SuccessResource
    {
        $data = FeeTemplate::update($request->validated(), $id);
        return  new FeeTemplateResource($data, $messages='FeeTemplate updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=FeeTemplate::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'FeeTemplate deleted successfully':'FeeTemplate not found',
        ]);
    }
}
