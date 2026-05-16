<?php
namespace Modules\Aipt\VoucherCategory\Facades;

use Modules\Aipt\VoucherCategory\Contracts\VoucherCategoryServiceInterface;
use Illuminate\Support\Facades\Facade;

class VoucherCategoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherCategoryServiceInterface::class;
    }
}
