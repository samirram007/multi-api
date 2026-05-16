<?php
namespace Modules\Aipt\Language\Facades;

use Modules\Aipt\Language\Contracts\LanguageServiceInterface;
use Illuminate\Support\Facades\Facade;

class LanguageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return LanguageServiceInterface::class;
    }
}
