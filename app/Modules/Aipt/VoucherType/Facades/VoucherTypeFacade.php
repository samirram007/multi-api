<?php
namespace Modules\Aipt\VoucherType\Facades;

use Modules\Aipt\VoucherType\Contracts\VoucherTypeServiceInterface;
use Illuminate\Support\Facades\Facade;

class VoucherTypeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherTypeServiceInterface::class;
    }
}
