<?php
namespace Modules\Document\SharedDocument\Facades;
use Modules\Document\SharedDocument\Contracts\SharedDocumentRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class SharedDocumentRepoFacade extends Facade
{
    protected static function getFacadeAccessor() { return SharedDocumentRepositoryInterface::class; }
}
