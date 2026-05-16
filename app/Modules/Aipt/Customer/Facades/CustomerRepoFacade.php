<?php
namespace Modules\Aipt\Customer\Facades;

use Modules\Aipt\Customer\Contracts\CustomerRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class CustomerRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CustomerRepositoryInterface::class;
    }
}
