<?php

namespace Modules\Aipt\CostCategory\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Aipt\CostCategory\Contracts\CostCategoryServiceInterface;

class CostCategoryFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return CostCategoryServiceInterface::class;
    }
}
