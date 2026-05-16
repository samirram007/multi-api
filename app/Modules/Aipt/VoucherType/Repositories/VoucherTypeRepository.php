<?php
namespace Modules\Aipt\VoucherType\Repositories;

use Modules\Aipt\VoucherType\Contracts\VoucherTypeRepositoryInterface;
use Modules\Aipt\VoucherType\Models\VoucherType;
use App\Support\Repositories\BaseRepository;

class VoucherTypeRepository extends BaseRepository implements VoucherTypeRepositoryInterface
{
    public function __construct(VoucherType $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
