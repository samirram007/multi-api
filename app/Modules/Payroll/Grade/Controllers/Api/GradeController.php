<?php

namespace Modules\Payroll\Grade\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Payroll\Grade\Facades\GradeFacade;
use Modules\Payroll\Grade\Resources\GradeResource;
use Modules\Payroll\Grade\Resources\GradeCollection;
use Modules\Payroll\Grade\Requests\GradeRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class GradeController extends Controller
{
    use ApiResponseTrait;

    public function index(): GradeCollection
    {
        $data = GradeFacade::getAll();
        return new GradeCollection($data);
    }

    public function show(int $id): GradeResource
    {
        $data = GradeFacade::getById($id);
        return  new GradeResource($data);
    }

    public function store(GradeRequest $request): GradeResource
    {
        $data = GradeFacade::store($request->validated());
       return  new GradeResource($data, $messages='Grade created successfully');
    }

    public function update(GradeRequest $request, int $id): GradeResource
    {
        $data = GradeFacade::update($request->validated(), $id);
        return  new GradeResource($data, $messages='Grade updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=GradeFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Grade deleted successfully':'Grade not found',
        ]);
    }
}
