<?php

namespace Modules\School\Room\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\School\Room\Resources\RoomResource;
use Modules\School\Room\Resources\RoomCollection;
use Modules\School\Room\Requests\RoomRequest;
use Modules\School\Room\Facades\RoomFacade as Room;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class RoomController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Room::getAll();
        return new RoomCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Room::getById($id);
        return  new RoomResource($data);
    }

    public function store(RoomRequest $request): SuccessResource
    {
        $data = Room::store($request->validated());
       return  new RoomResource($data, $messages='Room created successfully');
    }

    public function update(RoomRequest $request, int $id): SuccessResource
    {
        $data = Room::update($request->validated(), $id);
        return  new RoomResource($data, $messages='Room updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Room::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Room deleted successfully':'Room not found',
        ]);
    }
}
