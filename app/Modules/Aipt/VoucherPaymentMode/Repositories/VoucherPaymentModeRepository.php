<?php
namespace Modules\Aipt\VoucherPaymentMode\Repositories;

use Modules\Aipt\VoucherPaymentMode\Contracts\VoucherPaymentModeRepositoryInterface;
use Modules\Aipt\VoucherPaymentMode\Models\VoucherPaymentMode;
use App\Support\Repositories\BaseRepository;

class VoucherPaymentModeRepository extends BaseRepository implements VoucherPaymentModeRepositoryInterface
{
    public function __construct(VoucherPaymentMode $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
