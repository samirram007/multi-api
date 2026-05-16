<?php
namespace Modules\Base\Auth\Facades;

use Modules\Base\Auth\Contracts\AuthServiceInterface;
use Illuminate\Support\Facades\Facade;

class AuthFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AuthServiceInterface::class;
    }
}
