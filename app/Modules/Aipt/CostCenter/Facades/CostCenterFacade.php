<?php

namespace Modules\Aipt\CostCenter\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Aipt\CostCenter\Contracts\CostCenterServiceInterface;

class CostCenterFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return CostCenterServiceInterface::class;
    }
}
