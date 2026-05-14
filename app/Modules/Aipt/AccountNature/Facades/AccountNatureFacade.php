<?php

namespace Modules\Aipt\AccountNature\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Aipt\AccountNature\Contracts\AccountNatureServiceInterface;

class AccountNatureFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return AccountNatureServiceInterface::class;
    }
}
