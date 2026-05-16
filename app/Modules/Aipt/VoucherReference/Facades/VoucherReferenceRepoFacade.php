<?php
namespace Modules\Aipt\VoucherReference\Facades;

use Modules\Aipt\VoucherReference\Contracts\VoucherReferenceRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class VoucherReferenceRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherReferenceRepositoryInterface::class;
    }
}
