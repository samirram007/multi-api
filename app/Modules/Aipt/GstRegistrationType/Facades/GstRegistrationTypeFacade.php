<?php
namespace Modules\Aipt\GstRegistrationType\Facades;

use Modules\Aipt\GstRegistrationType\Contracts\GstRegistrationTypeServiceInterface;
use Illuminate\Support\Facades\Facade;

class GstRegistrationTypeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return GstRegistrationTypeServiceInterface::class;
    }
}
