<?php
namespace Modules\Document\Document\Repositories;

use Modules\Document\Document\Contracts\DocumentRepositoryInterface;
use Modules\Document\Document\Models\Document;
use App\Support\Repositories\BaseRepository;

class DocumentRepository extends BaseRepository implements DocumentRepositoryInterface
{
    public function __construct(Document $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
