<?php
namespace Modules\Aipt\AccountNature\Repositories;

use Modules\Aipt\AccountNature\Contracts\AccountNatureRepositoryInterface;
use Modules\Aipt\AccountNature\Models\AccountNature;
use App\Support\Repositories\BaseRepository;

class AccountNatureRepository extends BaseRepository implements AccountNatureRepositoryInterface
{
    public function __construct(AccountNature $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
