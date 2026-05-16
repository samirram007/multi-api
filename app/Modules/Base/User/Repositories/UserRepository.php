<?php
namespace Modules\Base\User\Repositories;

use Modules\Base\User\Contracts\UserRepositoryInterface;
use Modules\Base\User\Models\User;
use App\Support\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
