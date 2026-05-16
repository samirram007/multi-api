<?php
namespace Modules\Base\Currency\Facades;

use Modules\Base\Currency\Contracts\CurrencyServiceInterface;
use Illuminate\Support\Facades\Facade;

class CurrencyFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CurrencyServiceInterface::class;
    }
}
