<?php
namespace Modules\Base\RolePermission\Repositories;

use Modules\Base\RolePermission\Contracts\RolePermissionRepositoryInterface;
use Modules\Base\RolePermission\Models\RolePermission;
use App\Support\Repositories\BaseRepository;

class RolePermissionRepository extends BaseRepository implements RolePermissionRepositoryInterface
{
    public function __construct(RolePermission $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
