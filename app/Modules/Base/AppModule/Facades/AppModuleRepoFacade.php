<?php
namespace Modules\Base\AppModule\Facades;
use Modules\Base\AppModule\Contracts\AppModuleRepositoryInterface;
use Illuminate\Support\Facades\Facade;
class AppModuleRepoFacade extends Facade
{
    protected static function getFacadeAccessor() { return AppModuleRepositoryInterface::class; }
}
