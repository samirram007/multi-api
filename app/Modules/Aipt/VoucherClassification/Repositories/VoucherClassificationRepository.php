<?php
namespace Modules\Aipt\VoucherClassification\Repositories;

use Modules\Aipt\VoucherClassification\Contracts\VoucherClassificationRepositoryInterface;
use Modules\Aipt\VoucherClassification\Models\VoucherClassification;
use App\Support\Repositories\BaseRepository;

class VoucherClassificationRepository extends BaseRepository implements VoucherClassificationRepositoryInterface
{
    public function __construct(VoucherClassification $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
