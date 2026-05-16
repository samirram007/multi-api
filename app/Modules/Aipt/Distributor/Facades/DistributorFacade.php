<?php
namespace Modules\Aipt\Distributor\Facades;

use Modules\Aipt\Distributor\Contracts\DistributorServiceInterface;
use Illuminate\Support\Facades\Facade;

class DistributorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return DistributorServiceInterface::class;
    }
}
