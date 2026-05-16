<?php
namespace Modules\Base\Role\Repositories;

use Modules\Base\Role\Contracts\RoleRepositoryInterface;
use Modules\Base\Role\Models\Role;
use App\Support\Repositories\BaseRepository;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function __construct(Role $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
