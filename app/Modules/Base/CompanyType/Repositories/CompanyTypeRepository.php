<?php
namespace Modules\Base\CompanyType\Repositories;

use Modules\Base\CompanyType\Contracts\CompanyTypeRepositoryInterface;
use Modules\Base\CompanyType\Models\CompanyType;
use App\Support\Repositories\BaseRepository;

class CompanyTypeRepository extends BaseRepository implements CompanyTypeRepositoryInterface
{
    public function __construct(CompanyType $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
