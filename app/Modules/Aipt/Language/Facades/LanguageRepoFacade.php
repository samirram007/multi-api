<?php
namespace Modules\Aipt\Language\Facades;

use Modules\Aipt\Language\Contracts\LanguageRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class LanguageRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return LanguageRepositoryInterface::class;
    }
}
