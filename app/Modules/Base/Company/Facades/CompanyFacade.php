<?php
namespace App\Modules\Base\Company\Facades;

use App;
use App\Modules\Base\Company\Contracts\CompanyServiceInterface;
use Illuminate\Support\Facades\Facade;

class CompanyFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return CompanyServiceInterface::class;
    }
}
