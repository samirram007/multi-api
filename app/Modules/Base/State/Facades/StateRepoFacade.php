<?php

namespace Modules\Base\State\Facades;

use Modules\Base\State\Contracts\StateRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class StateRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StateRepositoryInterface::class;
    }
}
