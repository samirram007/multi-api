<?php
namespace Modules\Aipt\Vendor\Facades;

use Modules\Aipt\Vendor\Contracts\VendorRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class VendorRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VendorRepositoryInterface::class;
    }
}
