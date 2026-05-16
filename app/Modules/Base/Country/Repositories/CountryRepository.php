<?php
namespace Modules\Base\Country\Repositories;

use Modules\Base\Country\Contracts\CountryRepositoryInterface;
use Modules\Base\Country\Models\Country;
use App\Support\Repositories\BaseRepository;

class CountryRepository extends BaseRepository implements CountryRepositoryInterface
{
    public function __construct(Country $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
