<?php
namespace Modules\Aipt\StockItemSerial\Repositories;

use Modules\Aipt\StockItemSerial\Contracts\StockItemSerialRepositoryInterface;
use Modules\Aipt\StockItemSerial\Models\StockItemSerial;
use App\Support\Repositories\BaseRepository;

class StockItemSerialRepository extends BaseRepository implements StockItemSerialRepositoryInterface
{
    public function __construct(StockItemSerial $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
