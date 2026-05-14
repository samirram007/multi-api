<?php

namespace Modules\Aipt\HsnSacCode\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Aipt\HsnSacCode\Contracts\HsnSacCodeServiceInterface;

class HsnSacCodeFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return HsnSacCodeServiceInterface::class;
    }
}
