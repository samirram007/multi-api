<?php
namespace Modules\Aipt\CostCategory\Facades;

use Modules\Aipt\CostCategory\Contracts\CostCategoryServiceInterface;
use Illuminate\Support\Facades\Facade;

class CostCategoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CostCategoryServiceInterface::class;
    }
}
