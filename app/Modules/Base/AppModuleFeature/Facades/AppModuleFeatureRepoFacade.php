<?php
namespace Modules\Base\AppModuleFeature\Facades;
use Modules\Base\AppModuleFeature\Contracts\AppModuleFeatureRepositoryInterface;
use Illuminate\Support\Facades\Facade;
class AppModuleFeatureRepoFacade extends Facade
{
    protected static function getFacadeAccessor() { return AppModuleFeatureRepositoryInterface::class; }
}
