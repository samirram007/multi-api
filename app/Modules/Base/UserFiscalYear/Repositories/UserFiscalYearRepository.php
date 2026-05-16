<?php
namespace Modules\Base\UserFiscalYear\Repositories;

use Modules\Base\UserFiscalYear\Contracts\UserFiscalYearRepositoryInterface;
use Modules\Base\UserFiscalYear\Models\UserFiscalYear;
use App\Support\Repositories\BaseRepository;

class UserFiscalYearRepository extends BaseRepository implements UserFiscalYearRepositoryInterface
{
    public function __construct(UserFiscalYear $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
