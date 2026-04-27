<?php
namespace Modules\Base\Country\Facades;

use Modules\Base\Country\Contracts\CountryRepositoryInterface;
use Illuminate\Support\Facades\Facade;
class CountryRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CountryRepositoryInterface::class;
    }
}
