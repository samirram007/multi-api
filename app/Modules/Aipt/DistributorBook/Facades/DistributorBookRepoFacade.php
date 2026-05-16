<?php
namespace Modules\Aipt\DistributorBook\Facades;

use Modules\Aipt\DistributorBook\Contracts\DistributorBookRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class DistributorBookRepoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return DistributorBookRepositoryInterface::class;
    }
}
