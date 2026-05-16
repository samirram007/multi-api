<?php
namespace Modules\Aipt\CostCategory\Facades;

use Modules\Aipt\CostCategory\Contracts\CostCategoryRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class CostCategoryRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CostCategoryRepositoryInterface::class;
    }
}
