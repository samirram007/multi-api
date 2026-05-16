<?php
namespace Modules\Aipt\HsnSacCode\Facades;

use Modules\Aipt\HsnSacCode\Contracts\HsnSacCodeRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class HsnSacCodeRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return HsnSacCodeRepositoryInterface::class;
    }
}
