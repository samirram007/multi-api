<?php
namespace Modules\App\AliBaba\Repositories;

use Modules\App\AliBaba\Contracts\AliBabaRepositoryInterface;
use Modules\App\AliBaba\Models\AliBaba;
use App\Support\Repositories\BaseRepository;

class AliBabaRepository extends BaseRepository implements AliBabaRepositoryInterface
{
    public function __construct(AliBaba $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
