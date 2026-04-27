<?php
namespace Modules\App\Menu\Facades;
use Modules\App\Menu\Contracts\MenuServiceInterface;
use Illuminate\Support\Facades\Facade;
class MenuFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return MenuServiceInterface::class;
    }
}

