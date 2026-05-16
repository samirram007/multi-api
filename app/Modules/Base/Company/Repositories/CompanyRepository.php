<?php
namespace Modules\Base\Company\Repositories;

use Modules\Base\Company\Contracts\CompanyRepositoryInterface;
use Modules\Base\Company\Models\Company;
use App\Support\Repositories\BaseRepository;

class CompanyRepository extends BaseRepository implements CompanyRepositoryInterface
{
    public function __construct(Company $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
