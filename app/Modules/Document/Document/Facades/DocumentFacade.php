<?php
namespace Modules\Document\Document\Facades;

use Modules\Document\Document\Contracts\DocumentServiceInterface;
use Illuminate\Support\Facades\Facade;
class DocumentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return DocumentServiceInterface::class;
    }
}
