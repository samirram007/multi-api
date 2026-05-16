<?php
namespace Modules\Aipt\VoucherParty\Facades;

use Modules\Aipt\VoucherParty\Contracts\VoucherPartyRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class VoucherPartyRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherPartyRepositoryInterface::class;
    }
}
