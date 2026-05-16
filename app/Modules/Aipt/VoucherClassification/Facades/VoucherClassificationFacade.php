<?php
namespace Modules\Aipt\VoucherClassification\Facades;

use Modules\Aipt\VoucherClassification\Contracts\VoucherClassificationServiceInterface;
use Illuminate\Support\Facades\Facade;

class VoucherClassificationFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherClassificationServiceInterface::class;
    }
}
