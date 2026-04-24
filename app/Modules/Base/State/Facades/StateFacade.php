<?php

namespace App\Modules\Base\State\Facades;

use App\Modules\Base\State\Contracts\StateServiceInterface;
use Illuminate\Support\Facades\Facade;

class StateFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StateServiceInterface::class;
    }
}
