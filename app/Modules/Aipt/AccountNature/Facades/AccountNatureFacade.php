<?php
namespace Modules\Aipt\AccountNature\Facades;

use Modules\Aipt\AccountNature\Contracts\AccountNatureServiceInterface;
use Illuminate\Support\Facades\Facade;

class AccountNatureFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AccountNatureServiceInterface::class;
    }
}
