<?php
namespace App\Modules\Maintenance\Facades;
use App\Modules\Maintenance\Contracts\MaintenanceServiceInterface;
use Illuminate\Support\Facades\Facade;
class MaintenanceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return MaintenanceServiceInterface::class;
    }
}

