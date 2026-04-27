<?php
namespace Modules\Base\Company\Facades;

use App;
use Modules\Base\Company\Contracts\CompanyServiceInterface;
use Illuminate\Support\Facades\Facade;

class CompanyFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return CompanyServiceInterface::class;
    }
}
