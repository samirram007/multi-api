<?php
namespace Modules\Aipt\VoucherType\Facades;

use Modules\Aipt\VoucherType\Contracts\VoucherTypeRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class VoucherTypeRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherTypeRepositoryInterface::class;
    }
}
