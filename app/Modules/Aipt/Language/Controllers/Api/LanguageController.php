<?php

namespace Modules\Aipt\Language\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Aipt\Language\Facades\LanguageFacade;
use Modules\Aipt\Language\Resources\LanguageResource;
use Modules\Aipt\Language\Resources\LanguageCollection;
use Modules\Aipt\Language\Requests\LanguageRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class LanguageController extends Controller
{
    use ApiResponseTrait;

    public function index(): LanguageCollection
    {
        $data = LanguageFacade::getAll();
        return new LanguageCollection($data);
    }

    public function show(int $id): LanguageResource
    {
        $data = LanguageFacade::getById($id);
        return new LanguageResource($data);
    }

    public function store(LanguageRequest $request): LanguageResource
    {
        $data = LanguageFacade::store($request->validated());
        return new LanguageResource($data, $messages = 'Language created successfully');
    }

    public function update(LanguageRequest $request, int $id): LanguageResource
    {
        $data = LanguageFacade::update($request->validated(), $id);
        return new LanguageResource($data, $messages = 'Language updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {
        $result = LanguageFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'Language deleted successfully' : 'Language not found',
        ]);
    }
}
