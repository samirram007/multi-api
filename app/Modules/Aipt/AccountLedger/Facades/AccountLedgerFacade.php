<?php
namespace Modules\Aipt\AccountLedger\Facades;

use Modules\Aipt\AccountLedger\Contracts\AccountLedgerServiceInterface;
use Illuminate\Support\Facades\Facade;

class AccountLedgerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AccountLedgerServiceInterface::class;
    }
}
