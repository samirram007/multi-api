<?php
namespace Modules\Aipt\VoucherNo\Repositories;

use Modules\Aipt\VoucherNo\Contracts\VoucherNoRepositoryInterface;
use Modules\Aipt\VoucherNo\Models\VoucherNo;
use App\Support\Repositories\BaseRepository;

class VoucherNoRepository extends BaseRepository implements VoucherNoRepositoryInterface
{
    public function __construct(VoucherNo $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
