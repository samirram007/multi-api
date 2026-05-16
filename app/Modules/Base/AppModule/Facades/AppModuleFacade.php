<?php
namespace Modules\Base\AppModule\Facades;
use Modules\Base\AppModule\Contracts\AppModuleServiceInterface;
use Illuminate\Support\Facades\Facade;
class AppModuleFacade extends Facade
{
    protected static function getFacadeAccessor() { return AppModuleServiceInterface::class; }
}
