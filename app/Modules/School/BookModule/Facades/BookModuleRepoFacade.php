<?php
namespace Modules\School\BookModule\Facades;
use Modules\School\BookModule\Contracts\BookModuleRepositoryInterface;
use Illuminate\Support\Facades\Facade;
class BookModuleRepoFacade extends Facade
{
    protected static function getFacadeAccessor() { return BookModuleRepositoryInterface::class; }
}
