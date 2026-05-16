<?php
namespace Modules\Aipt\Holiday\Repositories;

use Modules\Aipt\Holiday\Contracts\HolidayRepositoryInterface;
use Modules\Aipt\Holiday\Models\Holiday;
use App\Support\Repositories\BaseRepository;

class HolidayRepository extends BaseRepository implements HolidayRepositoryInterface
{
    public function __construct(Holiday $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
