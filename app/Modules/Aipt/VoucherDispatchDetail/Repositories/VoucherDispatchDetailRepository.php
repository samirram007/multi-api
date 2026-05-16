<?php
namespace Modules\Aipt\VoucherDispatchDetail\Repositories;

use Modules\Aipt\VoucherDispatchDetail\Contracts\VoucherDispatchDetailRepositoryInterface;
use Modules\Aipt\VoucherDispatchDetail\Models\VoucherDispatchDetail;
use App\Support\Repositories\BaseRepository;

class VoucherDispatchDetailRepository extends BaseRepository implements VoucherDispatchDetailRepositoryInterface
{
    public function __construct(VoucherDispatchDetail $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
