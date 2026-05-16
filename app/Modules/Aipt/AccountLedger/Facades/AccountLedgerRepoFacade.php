<?php
namespace Modules\Aipt\AccountLedger\Facades;

use Modules\Aipt\AccountLedger\Contracts\AccountLedgerRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class AccountLedgerRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AccountLedgerRepositoryInterface::class;
    }
}
