<?php
namespace Modules\Aipt\UniqueQuantityCode\Facades;

use Modules\Aipt\UniqueQuantityCode\Contracts\UniqueQuantityCodeServiceInterface;
use Illuminate\Support\Facades\Facade;

class UniqueQuantityCodeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UniqueQuantityCodeServiceInterface::class;
    }
}
