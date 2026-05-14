<?php

namespace Modules\Aipt\Holiday\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Aipt\Holiday\Facades\HolidayFacade;
use Modules\Aipt\Holiday\Resources\HolidayResource;
use Modules\Aipt\Holiday\Resources\HolidayCollection;
use Modules\Aipt\Holiday\Requests\HolidayRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class HolidayController extends Controller
{
    use ApiResponseTrait;

    public function index(): HolidayCollection
    {
        $data = HolidayFacade::getAll();
        return new HolidayCollection($data);
    }

    public function show(int $id): HolidayResource
    {
        $data = HolidayFacade::getById($id);
        return  new HolidayResource($data);
    }

    public function store(HolidayRequest $request): HolidayResource
    {
        $data = HolidayFacade::store($request->validated());
       return  new HolidayResource($data, $messages='Holiday created successfully');
    }

    public function update(HolidayRequest $request, int $id): HolidayResource
    {
        $data = HolidayFacade::update($request->validated(), $id);
        return  new HolidayResource($data, $messages='Holiday updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=HolidayFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Holiday deleted successfully':'Holiday not found',
        ]);
    }
}
