<?php
namespace Modules\Aipt\DayBook\Repositories;

use Modules\Aipt\DayBook\Contracts\DayBookRepositoryInterface;
use Modules\Aipt\DayBook\Models\DayBook;
use App\Support\Repositories\BaseRepository;

class DayBookRepository extends BaseRepository implements DayBookRepositoryInterface
{
    public function __construct(DayBook $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
