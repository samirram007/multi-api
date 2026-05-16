<?php
namespace Modules\Aipt\Voucher\Facades;

use Modules\Aipt\Voucher\Contracts\VoucherRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class VoucherRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherRepositoryInterface::class;
    }
}
