<?php
namespace Modules\Aipt\Voucher\Facades;

use Modules\Aipt\Voucher\Contracts\VoucherServiceInterface;
use Illuminate\Support\Facades\Facade;

class VoucherFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherServiceInterface::class;
    }
}
