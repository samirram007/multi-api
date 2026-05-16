<?php
namespace Modules\Aipt\Distributor\Facades;

use Modules\Aipt\Distributor\Contracts\DistributorRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class DistributorRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return DistributorRepositoryInterface::class;
    }
}
