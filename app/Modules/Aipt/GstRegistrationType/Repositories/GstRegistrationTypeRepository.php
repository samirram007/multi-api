<?php
namespace Modules\Aipt\GstRegistrationType\Repositories;

use Modules\Aipt\GstRegistrationType\Contracts\GstRegistrationTypeRepositoryInterface;
use Modules\Aipt\GstRegistrationType\Models\GstRegistrationType;
use App\Support\Repositories\BaseRepository;

class GstRegistrationTypeRepository extends BaseRepository implements GstRegistrationTypeRepositoryInterface
{
    public function __construct(GstRegistrationType $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
