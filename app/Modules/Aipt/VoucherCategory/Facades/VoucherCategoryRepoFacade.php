<?php
namespace Modules\Aipt\VoucherCategory\Facades;

use Modules\Aipt\VoucherCategory\Contracts\VoucherCategoryRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class VoucherCategoryRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherCategoryRepositoryInterface::class;
    }
}
