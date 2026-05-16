<?php
namespace Modules\Aipt\VoucherPaymentMode\Facades;

use Modules\Aipt\VoucherPaymentMode\Contracts\VoucherPaymentModeServiceInterface;
use Illuminate\Support\Facades\Facade;

class VoucherPaymentModeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherPaymentModeServiceInterface::class;
    }
}
