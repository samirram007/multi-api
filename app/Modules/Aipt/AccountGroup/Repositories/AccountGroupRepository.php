<?php
namespace Modules\Aipt\AccountGroup\Repositories;

use Modules\Aipt\AccountGroup\Contracts\AccountGroupRepositoryInterface;
use Modules\Aipt\AccountGroup\Models\AccountGroup;
use App\Support\Repositories\BaseRepository;

class AccountGroupRepository extends BaseRepository implements AccountGroupRepositoryInterface
{
    public function __construct(AccountGroup $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
