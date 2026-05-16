<?php
namespace Modules\Base\AppModule\Repositories;

use Modules\Base\AppModule\Contracts\AppModuleRepositoryInterface;
use Modules\Base\AppModule\Models\AppModule;
use App\Support\Repositories\BaseRepository;

class AppModuleRepository extends BaseRepository implements AppModuleRepositoryInterface
{
    public function __construct(AppModule $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
