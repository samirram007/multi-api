<?php
namespace Modules\Aipt\VoucherReference\Facades;

use Modules\Aipt\VoucherReference\Contracts\VoucherReferenceServiceInterface;
use Illuminate\Support\Facades\Facade;

class VoucherReferenceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherReferenceServiceInterface::class;
    }
}
