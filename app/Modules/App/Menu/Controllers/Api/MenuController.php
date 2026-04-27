<?php

namespace Modules\App\Menu\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\App\Menu\Resources\MenuResource;
use Modules\App\Menu\Resources\MenuCollection;
use Modules\App\Menu\Requests\MenuRequest;
use Modules\App\Menu\Facades\MenuFacade as Menu;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class MenuController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Menu::getAll();
        return new MenuCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Menu::getById($id);
        return  new MenuResource($data);
    }

    public function store(MenuRequest $request): SuccessResource
    {
        $data = Menu::store($request->validated());
       return  new MenuResource($data, $messages='Menu created successfully');
    }

    public function update(MenuRequest $request, int $id): SuccessResource
    {
        $data = Menu::update($request->validated(), $id);
        return  new MenuResource($data, $messages='Menu updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Menu::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Menu deleted successfully':'Menu not found',
        ]);
    }
}
