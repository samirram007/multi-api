<?php

namespace Modules\School\Section\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\School\Section\Resources\SectionResource;
use Modules\School\Section\Resources\SectionCollection;
use Modules\School\Section\Requests\SectionRequest;
use Modules\School\Section\Facades\SectionFacade as Section;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class SectionController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Section::getAll();
        return new SectionCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Section::getById($id);
        return  new SectionResource($data);
    }

    public function store(SectionRequest $request): SuccessResource
    {
        $data = Section::store($request->validated());
       return  new SectionResource($data, $messages='Section created successfully');
    }

    public function update(SectionRequest $request, int $id): SuccessResource
    {
        $data = Section::update($request->validated(), $id);
        return  new SectionResource($data, $messages='Section updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Section::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Section deleted successfully':'Section not found',
        ]);
    }
}
