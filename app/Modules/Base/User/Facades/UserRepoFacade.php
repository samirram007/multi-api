<?php
namespace Modules\Base\User\Facades;

use Modules\Base\User\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class UserRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UserRepositoryInterface::class;
    }
}
