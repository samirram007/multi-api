<?php

namespace Modules\Aipt\DistributorBook\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Aipt\DistributorBook\Contracts\DistributorBookServiceInterface;

class DistributorBookFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return DistributorBookServiceInterface::class;
    }
}
