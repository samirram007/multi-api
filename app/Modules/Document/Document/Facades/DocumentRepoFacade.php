<?php
namespace Modules\Document\Document\Facades;
use Modules\Document\Document\Contracts\DocumentRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class DocumentRepoFacade extends Facade
{
    protected static function getFacadeAccessor() { return DocumentRepositoryInterface::class; }
}
