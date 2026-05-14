<?php

namespace Modules\Aipt\AccountLedger\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Aipt\AccountLedger\Contracts\AccountLedgerServiceInterface;

class AccountLedgerFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return AccountLedgerServiceInterface::class;
    }
}
