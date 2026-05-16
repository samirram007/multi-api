<?php
namespace Modules\Base\Address\Repositories;

use Modules\Base\Address\Contracts\AddressRepositoryInterface;
use Modules\Base\Address\Models\Address;
use App\Support\Repositories\BaseRepository;

class AddressRepository extends BaseRepository implements AddressRepositoryInterface
{
    public function __construct(Address $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
