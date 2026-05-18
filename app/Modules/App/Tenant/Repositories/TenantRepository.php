<?php

namespace Modules\App\Tenant\Repositories;

use Modules\App\Tenant\Contracts\TenantRepositoryInterface;
use Modules\App\Tenant\Models\Tenant;
use App\Support\Repositories\BaseRepository;

class TenantRepository extends BaseRepository implements TenantRepositoryInterface
{
    public function __construct(Tenant $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
