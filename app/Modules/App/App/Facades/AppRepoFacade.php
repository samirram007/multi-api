<?php

namespace Modules\App\App\Facades;

use Modules\App\App\Contracts\AppRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class AppRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AppRepositoryInterface::class;
    }
}
