<?php
namespace Modules\Aipt\Vendor\Facades;

use Modules\Aipt\Vendor\Contracts\VendorServiceInterface;
use Illuminate\Support\Facades\Facade;

class VendorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VendorServiceInterface::class;
    }
}
