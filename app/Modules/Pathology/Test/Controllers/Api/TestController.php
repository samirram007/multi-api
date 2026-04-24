<?php

namespace App\Modules\Pathology\Test\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\Pathology\Test\Resources\TestResource;
use App\Modules\Pathology\Test\Resources\TestCollection;
use App\Modules\Pathology\Test\Requests\TestRequest;
use App\Modules\Pathology\Test\Facades\TestFacade as Test;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Test::getAll();
        return new TestCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Test::getById($id);
        return  new TestResource($data);
    }

    public function store(TestRequest $request): SuccessResource
    {
        $data = Test::store($request->validated());
       return  new TestResource($data, $messages='Test created successfully');
    }

    public function update(TestRequest $request, int $id): SuccessResource
    {
        $data = Test::update($request->validated(), $id);
        return  new TestResource($data, $messages='Test updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Test::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Test deleted successfully':'Test not found',
        ]);
    }
}
