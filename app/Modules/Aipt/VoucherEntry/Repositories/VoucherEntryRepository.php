<?php
namespace Modules\Aipt\VoucherEntry\Repositories;

use Modules\Aipt\VoucherEntry\Contracts\VoucherEntryRepositoryInterface;
use Modules\Aipt\VoucherEntry\Models\VoucherEntry;
use App\Support\Repositories\BaseRepository;

class VoucherEntryRepository extends BaseRepository implements VoucherEntryRepositoryInterface
{
    public function __construct(VoucherEntry $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
