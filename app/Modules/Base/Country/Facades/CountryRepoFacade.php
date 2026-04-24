<?php
namespace App\Modules\Base\Country\Facades;

use App\Modules\Base\Country\Contracts\CountryRepositoryInterface;
use Illuminate\Support\Facades\Facade;
class CountryRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CountryRepositoryInterface::class;
    }
}
