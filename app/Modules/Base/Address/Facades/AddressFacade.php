<?php
namespace Modules\Base\Address\Facades;
use Modules\Base\Address\Contracts\AddressServiceInterface;
use Illuminate\Support\Facades\Facade;
class AddressFacade extends Facade
{
    protected static function getFacadeAccessor() { return AddressServiceInterface::class; }
}
