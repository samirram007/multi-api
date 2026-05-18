<?php
namespace Modules\Document\SharedDocument\Repositories;

use Modules\Document\SharedDocument\Contracts\SharedDocumentRepositoryInterface;
use Modules\Document\SharedDocument\Models\SharedDocument;
use App\Support\Repositories\BaseRepository;

class SharedDocumentRepository extends BaseRepository implements SharedDocumentRepositoryInterface
{
    public function __construct(SharedDocument $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
