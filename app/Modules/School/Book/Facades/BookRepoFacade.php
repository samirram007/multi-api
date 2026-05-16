<?php
namespace Modules\School\Book\Facades;
use Modules\School\Book\Contracts\BookRepositoryInterface;
use Illuminate\Support\Facades\Facade;
class BookRepoFacade extends Facade
{
    protected static function getFacadeAccessor() { return BookRepositoryInterface::class; }
}
