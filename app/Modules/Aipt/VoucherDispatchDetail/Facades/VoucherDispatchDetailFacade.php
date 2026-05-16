<?php
namespace Modules\Aipt\VoucherDispatchDetail\Facades;

use Modules\Aipt\VoucherDispatchDetail\Contracts\VoucherDispatchDetailServiceInterface;
use Illuminate\Support\Facades\Facade;

class VoucherDispatchDetailFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherDispatchDetailServiceInterface::class;
    }
}
