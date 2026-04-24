<?php

namespace App\Modules\School\FeeRule\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\FeeRule\Resources\FeeRuleResource;
use App\Modules\School\FeeRule\Resources\FeeRuleCollection;
use App\Modules\School\FeeRule\Requests\FeeRuleRequest;
use App\Modules\School\FeeRule\Facades\FeeRuleFacade as FeeRule;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class FeeRuleController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = FeeRule::getAll();
        return new FeeRuleCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = FeeRule::getById($id);
        return  new FeeRuleResource($data);
    }

    public function store(FeeRuleRequest $request): SuccessResource
    {
        $data = FeeRule::store($request->validated());
       return  new FeeRuleResource($data, $messages='FeeRule created successfully');
    }

    public function update(FeeRuleRequest $request, int $id): SuccessResource
    {
        $data = FeeRule::update($request->validated(), $id);
        return  new FeeRuleResource($data, $messages='FeeRule updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=FeeRule::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'FeeRule deleted successfully':'FeeRule not found',
        ]);
    }
}
