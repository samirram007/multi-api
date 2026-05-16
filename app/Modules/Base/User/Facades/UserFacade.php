<?php
namespace Modules\Base\User\Facades;

use Modules\Base\User\Contracts\UserServiceInterface;
use Illuminate\Support\Facades\Facade;

class UserFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UserServiceInterface::class;
    }
}
