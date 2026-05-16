<?php
namespace Modules\Aipt\VoucherCategory\Repositories;

use Modules\Aipt\VoucherCategory\Contracts\VoucherCategoryRepositoryInterface;
use Modules\Aipt\VoucherCategory\Models\VoucherCategory;
use App\Support\Repositories\BaseRepository;

class VoucherCategoryRepository extends BaseRepository implements VoucherCategoryRepositoryInterface
{
    public function __construct(VoucherCategory $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
