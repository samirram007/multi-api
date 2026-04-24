<?php

namespace App\Modules\Hotel\Booking\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\Hotel\Booking\Resources\BookingResource;
use App\Modules\Hotel\Booking\Resources\BookingCollection;
use App\Modules\Hotel\Booking\Requests\BookingRequest;
use App\Modules\Hotel\Booking\Facades\BookingFacade as Booking;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class BookingController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Booking::getAll();
        return new BookingCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Booking::getById($id);
        return  new BookingResource($data);
    }

    public function store(BookingRequest $request): SuccessResource
    {
        $data = Booking::store($request->validated());
       return  new BookingResource($data, $messages='Booking created successfully');
    }

    public function update(BookingRequest $request, int $id): SuccessResource
    {
        $data = Booking::update($request->validated(), $id);
        return  new BookingResource($data, $messages='Booking updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Booking::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Booking deleted successfully':'Booking not found',
        ]);
    }
}
