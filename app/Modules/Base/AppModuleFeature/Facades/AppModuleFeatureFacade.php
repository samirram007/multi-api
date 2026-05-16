<?php
namespace Modules\Base\AppModuleFeature\Facades;
use Modules\Base\AppModuleFeature\Contracts\AppModuleFeatureServiceInterface;
use Illuminate\Support\Facades\Facade;
class AppModuleFeatureFacade extends Facade
{
    protected static function getFacadeAccessor() { return AppModuleFeatureServiceInterface::class; }
}
