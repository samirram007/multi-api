<?php
namespace Modules\Aipt\StorageUnit\Facades;

use Modules\Aipt\StorageUnit\Contracts\StorageUnitServiceInterface;
use Illuminate\Support\Facades\Facade;

class StorageUnitFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StorageUnitServiceInterface::class;
    }
}
