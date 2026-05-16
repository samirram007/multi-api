<?php
namespace Modules\Aipt\VoucherReference\Repositories;

use Modules\Aipt\VoucherReference\Contracts\VoucherReferenceRepositoryInterface;
use Modules\Aipt\VoucherReference\Models\VoucherReference;
use App\Support\Repositories\BaseRepository;

class VoucherReferenceRepository extends BaseRepository implements VoucherReferenceRepositoryInterface
{
    public function __construct(VoucherReference $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
