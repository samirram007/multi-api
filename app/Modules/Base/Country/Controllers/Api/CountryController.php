<?php

namespace Modules\Base\Country\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SuccessCollection;

use Modules\Base\Country\Facades\CountryFacade;
use Modules\Base\Country\Resources\CountryResource;
use Modules\Base\Country\Resources\CountryCollection;
use Modules\Base\Country\Requests\CountryRequest;
use App\Http\Resources\SuccessResource;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;




class CountryController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    }


    public function index(): SuccessCollection
    {
        $data = CountryFacade::getAll();
        return new CountryCollection($data);
    }


    public function show(int $id): SuccessResource
    {
        $data = CountryFacade::getById($id);
        return new CountryResource($data, $messages = 'Country retrieved successfully');
    }



    public function store(CountryRequest $request): SuccessResource
    {
        $data = CountryFacade::store($request->validated());

        return new CountryResource($data, $messages = 'Country created successfully');
    }



    public function update(CountryRequest $request, int $id): SuccessResource
    {
        $data = CountryFacade::update($request->validated(), $id);

        return new CountryResource($data, $messages = 'Country updated successfully');
    }


    public function destroy(int $id): JsonResponse
    {
        $result = CountryFacade::delete($id);

        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'Country deleted successfully' : 'Country not found',
        ]);
    }

}
