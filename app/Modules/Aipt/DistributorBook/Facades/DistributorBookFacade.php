<?php
namespace Modules\Aipt\DistributorBook\Facades;

use Modules\Aipt\DistributorBook\Contracts\DistributorBookServiceInterface;
use Illuminate\Support\Facades\Facade;

class DistributorBookFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return DistributorBookServiceInterface::class;
    }
}
