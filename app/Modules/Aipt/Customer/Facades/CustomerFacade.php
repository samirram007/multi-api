<?php

namespace Modules\Aipt\Customer\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Aipt\Customer\Contracts\CustomerServiceInterface;

class CustomerFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return CustomerServiceInterface::class;
    }
}
