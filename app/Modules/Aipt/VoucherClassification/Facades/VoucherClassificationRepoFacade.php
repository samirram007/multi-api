<?php
namespace Modules\Aipt\VoucherClassification\Facades;

use Modules\Aipt\VoucherClassification\Contracts\VoucherClassificationRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class VoucherClassificationRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherClassificationRepositoryInterface::class;
    }
}
