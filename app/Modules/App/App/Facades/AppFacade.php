<?php
namespace Modules\App\App\Facades;
use Modules\App\App\Contracts\AppServiceInterface;
use Illuminate\Support\Facades\Facade;
class AppFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AppServiceInterface::class;
    }
}

