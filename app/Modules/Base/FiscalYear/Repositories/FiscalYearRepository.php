<?php
namespace Modules\Base\FiscalYear\Repositories;

use Modules\Base\FiscalYear\Contracts\FiscalYearRepositoryInterface;
use Modules\Base\FiscalYear\Models\FiscalYear;
use App\Support\Repositories\BaseRepository;

class FiscalYearRepository extends BaseRepository implements FiscalYearRepositoryInterface
{
    public function __construct(FiscalYear $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
