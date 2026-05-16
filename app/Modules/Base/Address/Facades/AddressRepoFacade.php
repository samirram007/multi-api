<?php
namespace Modules\Base\Address\Facades;
use Modules\Base\Address\Contracts\AddressRepositoryInterface;
use Illuminate\Support\Facades\Facade;
class AddressRepoFacade extends Facade
{
    protected static function getFacadeAccessor() { return AddressRepositoryInterface::class; }
}
