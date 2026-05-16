<?php
namespace Modules\Base\Currency\Repositories;

use Modules\Base\Currency\Contracts\CurrencyRepositoryInterface;
use Modules\Base\Currency\Models\Currency;
use App\Support\Repositories\BaseRepository;

class CurrencyRepository extends BaseRepository implements CurrencyRepositoryInterface
{
    public function __construct(Currency $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
