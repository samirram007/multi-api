<?php
namespace Modules\Base\FiscalYear\Facades;

use Modules\Base\FiscalYear\Contracts\FiscalYearRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class FiscalYearRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return FiscalYearRepositoryInterface::class;
    }
}
