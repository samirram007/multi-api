<?php
namespace Modules\Aipt\GstRegistrationType\Facades;

use Modules\Aipt\GstRegistrationType\Contracts\GstRegistrationTypeRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class GstRegistrationTypeRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return GstRegistrationTypeRepositoryInterface::class;
    }
}
