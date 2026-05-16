<?php
namespace Modules\Aipt\VoucherNo\Facades;

use Modules\Aipt\VoucherNo\Contracts\VoucherNoServiceInterface;
use Illuminate\Support\Facades\Facade;

class VoucherNoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherNoServiceInterface::class;
    }
}
