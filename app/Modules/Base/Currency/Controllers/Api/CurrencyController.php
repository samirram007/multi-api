<?php

namespace Modules\Base\Currency\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Base\Currency\Resources\CurrencyResource;
use Modules\Base\Currency\Resources\CurrencyCollection;
use Modules\Base\Currency\Requests\CurrencyRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Modules\Base\Currency\Facades\CurrencyFacade as Currency;

class CurrencyController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    }

    public function index(): SuccessCollection
    {
        $data = Currency::getAll();
        return new CurrencyCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Currency::getById($id);
        return new CurrencyResource($data, $messages = 'Currency retrieved successfully');


    }

    public function store(CurrencyRequest $request): SuccessResource
    {
        $data = Currency::store($request->validated());
        return new CurrencyResource($data, $messages = 'Currency created successfully');

    }

    public function update(CurrencyRequest $request, int $id): SuccessResource
    {
        $data = Currency::update($request->validated(), $id);
        return new CurrencyResource($data, $messages = 'Currency updated successfully');

    }

    public function destroy(int $id): JsonResponse
    {

        $result = Currency::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'Currency deleted successfully' : 'Currency not found',
        ]);

    }
}
