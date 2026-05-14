<?php

namespace Modules\Payroll\Shift\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Payroll\Shift\Facades\ShiftFacade as Shift;
use Modules\Payroll\Shift\Resources\ShiftResource;
use Modules\Payroll\Shift\Resources\ShiftCollection;
use Modules\Payroll\Shift\Requests\ShiftRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class ShiftController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Shift::getAll();
        return new ShiftCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Shift::getById($id);
        return  new ShiftResource($data);
    }

    public function store(ShiftRequest $request): SuccessResource
    {
        $data = Shift::store($request->validated());
       return  new ShiftResource($data, $messages='Shift created successfully');
    }

    public function update(ShiftRequest $request, int $id): SuccessResource
    {
        $data = Shift::update($request->validated(), $id);
        return  new ShiftResource($data, $messages='Shift updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Shift::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Shift deleted successfully':'Shift not found',
        ]);
    }
}
