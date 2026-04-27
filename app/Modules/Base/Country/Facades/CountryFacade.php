<?php
namespace Modules\Base\Country\Facades;

use Modules\Base\Country\Contracts\CountryServiceInterface;
use Illuminate\Support\Facades\Facade;
class CountryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CountryServiceInterface::class;
    }
}
