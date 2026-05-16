<?php

namespace Modules\Base\FiscalYear\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Base\FiscalYear\Resources\FiscalYearResource;
use Modules\Base\FiscalYear\Resources\FiscalYearCollection;
use Modules\Base\FiscalYear\Requests\FiscalYearRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Modules\Base\FiscalYear\Facades\FiscalYearFacade as FiscalYear;

class FiscalYearController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    }

    public function index(): SuccessCollection
    {
        $data = FiscalYear::getAll();
        return new FiscalYearCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = FiscalYear::getById($id);
        return new FiscalYearResource($data);
    }

    public function store(FiscalYearRequest $request): SuccessResource
    {
        $data = FiscalYear::store($request->validated());
        return new FiscalYearResource($data, $messages = 'FiscalYear created successfully');
    }

    public function update(FiscalYearRequest $request, int $id): SuccessResource
    {
        $data = FiscalYear::update($request->validated(), $id);
        return new FiscalYearResource($data, $messages = 'FiscalYear updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {

        $result = FiscalYear::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'FiscalYear deleted successfully' : 'FiscalYear not found',
        ]);
    }
}
