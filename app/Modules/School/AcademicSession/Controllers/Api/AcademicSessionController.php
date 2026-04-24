<?php

namespace App\Modules\School\AcademicSession\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\School\AcademicSession\Resources\AcademicSessionResource;
use App\Modules\School\AcademicSession\Resources\AcademicSessionCollection;
use App\Modules\School\AcademicSession\Requests\AcademicSessionRequest;
use App\Modules\School\AcademicSession\Facades\AcademicSessionFacade as AcademicSession;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class AcademicSessionController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = AcademicSession::getAll();
        return new AcademicSessionCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = AcademicSession::getById($id);
        return  new AcademicSessionResource($data);
    }

    public function store(AcademicSessionRequest $request): SuccessResource
    {
        $data = AcademicSession::store($request->validated());
       return  new AcademicSessionResource($data, $messages='AcademicSession created successfully');
    }

    public function update(AcademicSessionRequest $request, int $id): SuccessResource
    {
        $data = AcademicSession::update($request->validated(), $id);
        return  new AcademicSessionResource($data, $messages='AcademicSession updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=AcademicSession::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'AcademicSession deleted successfully':'AcademicSession not found',
        ]);
    }
}
