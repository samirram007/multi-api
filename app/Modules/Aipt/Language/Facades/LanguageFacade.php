<?php

namespace Modules\Aipt\Language\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Aipt\Language\Contracts\LanguageServiceInterface;

class LanguageFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return LanguageServiceInterface::class;
    }
}
