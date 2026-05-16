<?php
namespace Modules\Aipt\Supplier\Facades;

use Modules\Aipt\Supplier\Contracts\SupplierRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class SupplierRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SupplierRepositoryInterface::class;
    }
}
