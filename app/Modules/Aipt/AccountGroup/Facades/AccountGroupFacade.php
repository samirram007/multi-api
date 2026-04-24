<?php
namespace App\Modules\Aipt\AccountGroup\Facades;

use Illuminate\Support\Facades\Facade;
class AccountGroupFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'account_group_service';
    }
}
