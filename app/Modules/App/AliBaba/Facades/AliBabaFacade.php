<?php
namespace Modules\App\AliBaba\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\App\AliBaba\Contracts\AliBabaServiceInterface;

class AliBabaFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AliBabaServiceInterface::class;
    }
}
