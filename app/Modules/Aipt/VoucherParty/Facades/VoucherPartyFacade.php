<?php
namespace Modules\Aipt\VoucherParty\Facades;

use Modules\Aipt\VoucherParty\Contracts\VoucherPartyServiceInterface;
use Illuminate\Support\Facades\Facade;

class VoucherPartyFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VoucherPartyServiceInterface::class;
    }
}
