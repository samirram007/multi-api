<?php

namespace Modules\Aipt\Distributor\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Aipt\Distributor\Contracts\DistributorServiceInterface;

class DistributorFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return DistributorServiceInterface::class;
    }
}
