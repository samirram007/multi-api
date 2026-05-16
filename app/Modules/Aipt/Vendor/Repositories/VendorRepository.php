<?php
namespace Modules\Aipt\Vendor\Repositories;

use Modules\Aipt\Vendor\Contracts\VendorRepositoryInterface;
use Modules\Aipt\Vendor\Models\Vendor;
use App\Support\Repositories\BaseRepository;

class VendorRepository extends BaseRepository implements VendorRepositoryInterface
{
    public function __construct(Vendor $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
