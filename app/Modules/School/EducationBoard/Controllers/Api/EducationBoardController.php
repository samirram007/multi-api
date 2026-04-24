<?php

namespace App\Modules\School\EducationBoard\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\EducationBoard\Resources\EducationBoardResource;
use App\Modules\School\EducationBoard\Resources\EducationBoardCollection;
use App\Modules\School\EducationBoard\Requests\EducationBoardRequest;
use App\Modules\School\EducationBoard\Facades\EducationBoardFacade as EducationBoard;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class EducationBoardController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = EducationBoard::getAll();
        return new EducationBoardCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = EducationBoard::getById($id);
        return  new EducationBoardResource($data);
    }

    public function store(EducationBoardRequest $request): SuccessResource
    {
        $data = EducationBoard::store($request->validated());
       return  new EducationBoardResource($data, $messages='EducationBoard created successfully');
    }

    public function update(EducationBoardRequest $request, int $id): SuccessResource
    {
        $data = EducationBoard::update($request->validated(), $id);
        return  new EducationBoardResource($data, $messages='EducationBoard updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=EducationBoard::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'EducationBoard deleted successfully':'EducationBoard not found',
        ]);
    }
}
