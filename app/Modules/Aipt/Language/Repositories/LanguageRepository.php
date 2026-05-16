<?php
namespace Modules\Aipt\Language\Repositories;

use Modules\Aipt\Language\Contracts\LanguageRepositoryInterface;
use Modules\Aipt\Language\Models\Language;
use App\Support\Repositories\BaseRepository;

class LanguageRepository extends BaseRepository implements LanguageRepositoryInterface
{
    public function __construct(Language $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
