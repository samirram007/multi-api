<?php
namespace Modules\Aipt\CostCenter\Facades;

use Modules\Aipt\CostCenter\Contracts\CostCenterServiceInterface;
use Illuminate\Support\Facades\Facade;

class CostCenterFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CostCenterServiceInterface::class;
    }
}
