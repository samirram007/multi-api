<?php
namespace Modules\Aipt\VoucherPaymentMode\Facades;

use Modules\Aipt\VoucherPaymentMode\Contracts\VoucherPaymentModeRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class VoucherPaymentModeRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherPaymentModeRepositoryInterface::class;
    }
}
