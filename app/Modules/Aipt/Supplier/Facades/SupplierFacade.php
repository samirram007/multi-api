<?php
namespace Modules\Aipt\Supplier\Facades;

use Modules\Aipt\Supplier\Contracts\SupplierServiceInterface;
use Illuminate\Support\Facades\Facade;

class SupplierFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SupplierServiceInterface::class;
    }
}
