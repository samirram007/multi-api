<?php
namespace Modules\Aipt\VoucherNo\Facades;

use Modules\Aipt\VoucherNo\Contracts\VoucherNoRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class VoucherNoRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherNoRepositoryInterface::class;
    }
}
