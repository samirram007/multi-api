<?php

namespace App\Modules\Maintenance\Backup\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\Maintenance\Backup\Resources\BackupResource;
use App\Modules\Maintenance\Backup\Resources\BackupCollection;
use App\Modules\Maintenance\Backup\Requests\BackupRequest;
use App\Modules\Maintenance\Backup\Facades\BackupFacade as Backup;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class BackupController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    }

    public function index(): SuccessCollection
    {
        $data = Backup::getAll();
        return new BackupCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Backup::getById($id);
        return new BackupResource($data);
    }

    public function store(BackupRequest $request): SuccessResource
    {
        $data = Backup::store($request->validated());
        return new BackupResource($data, $messages = 'Backup created successfully');
    }

    public function update(BackupRequest $request, int $id): SuccessResource
    {
        $data = Backup::update($request->validated(), $id);
        return new BackupResource($data, $messages = 'Backup updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {

        $result = Backup::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'Backup deleted successfully' : 'Backup not found',
        ]);
    }
}
