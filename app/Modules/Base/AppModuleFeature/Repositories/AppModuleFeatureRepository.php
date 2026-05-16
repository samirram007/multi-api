<?php
namespace Modules\Base\AppModuleFeature\Repositories;

use Modules\Base\AppModuleFeature\Contracts\AppModuleFeatureRepositoryInterface;
use Modules\Base\AppModuleFeature\Models\AppModuleFeature;
use App\Support\Repositories\BaseRepository;

class AppModuleFeatureRepository extends BaseRepository implements AppModuleFeatureRepositoryInterface
{
    public function __construct(AppModuleFeature $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
