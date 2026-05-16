<?php
namespace Modules\Aipt\CostCenter\Facades;

use Modules\Aipt\CostCenter\Contracts\CostCenterRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class CostCenterRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CostCenterRepositoryInterface::class;
    }
}
