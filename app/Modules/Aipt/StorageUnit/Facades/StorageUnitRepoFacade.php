<?php
namespace Modules\Aipt\StorageUnit\Facades;

use Modules\Aipt\StorageUnit\Contracts\StorageUnitRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class StorageUnitRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StorageUnitRepositoryInterface::class;
    }
}
