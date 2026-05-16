<?php
namespace Modules\Aipt\VoucherEntry\Facades;

use Modules\Aipt\VoucherEntry\Contracts\VoucherEntryRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class VoucherEntryRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherEntryRepositoryInterface::class;
    }
}
