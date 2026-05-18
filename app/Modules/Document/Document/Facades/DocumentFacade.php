<?php
namespace Modules\Document\Document\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Document\Document\Contracts\DocumentServiceInterface;

class DocumentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return DocumentServiceInterface::class;
    }
}
