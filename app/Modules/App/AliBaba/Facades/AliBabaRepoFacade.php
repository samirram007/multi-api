<?php
namespace Modules\App\AliBaba\Facades;
use Modules\App\AliBaba\Contracts\AliBabaRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class AliBabaRepoFacade extends Facade
{
    protected static function getFacadeAccessor() { return AliBabaRepositoryInterface::class; }
}
