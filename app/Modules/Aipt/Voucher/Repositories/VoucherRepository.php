<?php
namespace Modules\Aipt\Voucher\Repositories;

use Modules\Aipt\Voucher\Contracts\VoucherRepositoryInterface;
use Modules\Aipt\Voucher\Models\Voucher;
use App\Support\Repositories\BaseRepository;

class VoucherRepository extends BaseRepository implements VoucherRepositoryInterface
{
    public function __construct(Voucher $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
