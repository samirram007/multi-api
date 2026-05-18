<?php

namespace Modules\App\TenantUser\Repositories;

use Modules\App\TenantUser\Contracts\TenantUserRepositoryInterface;
use Modules\App\TenantUser\Models\TenantUser;
use App\Support\Repositories\BaseRepository;

class TenantUserRepository extends BaseRepository implements TenantUserRepositoryInterface
{
    public function __construct(TenantUser $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
