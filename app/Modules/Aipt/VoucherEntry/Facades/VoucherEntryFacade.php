<?php
namespace Modules\Aipt\VoucherEntry\Facades;

use Modules\Aipt\VoucherEntry\Contracts\VoucherEntryServiceInterface;
use Illuminate\Support\Facades\Facade;

class VoucherEntryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherEntryServiceInterface::class;
    }
}
