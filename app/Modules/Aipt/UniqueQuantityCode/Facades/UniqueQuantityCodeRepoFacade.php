<?php
namespace Modules\Aipt\UniqueQuantityCode\Facades;

use Modules\Aipt\UniqueQuantityCode\Contracts\UniqueQuantityCodeRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class UniqueQuantityCodeRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UniqueQuantityCodeRepositoryInterface::class;
    }
}
