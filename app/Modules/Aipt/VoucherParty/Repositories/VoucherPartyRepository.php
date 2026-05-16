<?php
namespace Modules\Aipt\VoucherParty\Repositories;

use Modules\Aipt\VoucherParty\Contracts\VoucherPartyRepositoryInterface;
use Modules\Aipt\VoucherParty\Models\VoucherParty;
use App\Support\Repositories\BaseRepository;

class VoucherPartyRepository extends BaseRepository implements VoucherPartyRepositoryInterface
{
    public function __construct(VoucherParty $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
