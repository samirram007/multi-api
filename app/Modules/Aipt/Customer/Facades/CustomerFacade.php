<?php
namespace Modules\Aipt\Customer\Facades;

use Modules\Aipt\Customer\Contracts\CustomerServiceInterface;
use Illuminate\Support\Facades\Facade;

class CustomerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CustomerServiceInterface::class;
    }
}
