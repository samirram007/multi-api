<?php
namespace Modules\Base\FiscalYear\Facades;

use Modules\Base\FiscalYear\Contracts\FiscalYearServiceInterface;
use Illuminate\Support\Facades\Facade;

class FiscalYearFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return FiscalYearServiceInterface::class;
    }
}
