<?php
namespace Modules\Aipt\VoucherDispatchDetail\Facades;

use Modules\Aipt\VoucherDispatchDetail\Contracts\VoucherDispatchDetailRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class VoucherDispatchDetailRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherDispatchDetailRepositoryInterface::class;
    }
}
