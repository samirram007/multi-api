<?php
namespace Modules\Base\UserRole\Repositories;

use Modules\Base\UserRole\Contracts\UserRoleRepositoryInterface;
use Modules\Base\UserRole\Models\UserRole;
use App\Support\Repositories\BaseRepository;

class UserRoleRepository extends BaseRepository implements UserRoleRepositoryInterface
{
    public function __construct(UserRole $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
