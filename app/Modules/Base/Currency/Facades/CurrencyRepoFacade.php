<?php
namespace Modules\Base\Currency\Facades;

use Modules\Base\Currency\Contracts\CurrencyRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class CurrencyRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CurrencyRepositoryInterface::class;
    }
}
