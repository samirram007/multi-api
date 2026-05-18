<?php
namespace Modules\Document\SharedDocument\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Document\SharedDocument\Contracts\SharedDocumentServiceInterface;

class SharedDocumentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SharedDocumentServiceInterface::class;
    }
}
