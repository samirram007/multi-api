<?php

namespace App\Modules\Base\Company\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\Base\Company\Facades\CompanyFacade;
use App\Modules\Base\Company\Resources\CompanyResource;
use App\Modules\Base\Company\Resources\CompanyCollection;
use App\Modules\Base\Company\Requests\CompanyRequest;
use App\Http\Resources\SuccessResource;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class CompanyController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    }

    public function index(): JsonResponse
    {



        $cacheKey = 'companies_api_response';
        $cacheTtl = now()->addSeconds(10);
        $responseArray = Cache::remember($cacheKey, $cacheTtl, function () {

            $data = CompanyFacade::getAll();
            // Transform to array using resource collection
            return (new CompanyCollection($data))->response()->getData(true);
        });

        return response()->json($responseArray);
    }

    public function show(int $id): SuccessResource
    {
        $data = CompanyFacade::getById($id);
        return new CompanyResource($data, $messages = 'Company retrieved successfully');

    }

    public function store(CompanyRequest $request): SuccessResource
    {
        $data = CompanyFacade::store($request->validated());
        return new CompanyResource($data, $messages = 'Company created successfully');

    }

    public function update(CompanyRequest $request, int $id): SuccessResource
    {
        $data = CompanyFacade::update($request->validated(), $id);
        return new CompanyResource($data, $messages = 'Company updated successfully');

    }

    public function destroy(int $id): JsonResponse
    {

        $result = CompanyFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'Company deleted successfully' : 'Company not found',
        ]);

    }
}
