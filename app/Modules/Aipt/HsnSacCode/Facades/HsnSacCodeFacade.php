<?php
namespace Modules\Aipt\HsnSacCode\Facades;

use Modules\Aipt\HsnSacCode\Contracts\HsnSacCodeServiceInterface;
use Illuminate\Support\Facades\Facade;

class HsnSacCodeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return HsnSacCodeServiceInterface::class;
    }
}
