<?php

namespace Modules\Aipt\GstRegistrationType\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Aipt\GstRegistrationType\Contracts\GstRegistrationTypeServiceInterface;

class GstRegistrationTypeFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return GstRegistrationTypeServiceInterface::class;
    }
}
