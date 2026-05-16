<?php
namespace Modules\Aipt\AccountLedger\Repositories;

use Modules\Aipt\AccountLedger\Contracts\AccountLedgerRepositoryInterface;
use Modules\Aipt\AccountLedger\Models\AccountLedger;
use App\Support\Repositories\BaseRepository;

class AccountLedgerRepository extends BaseRepository implements AccountLedgerRepositoryInterface
{
    public function __construct(AccountLedger $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
