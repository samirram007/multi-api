<?php

namespace Modules\Document\SharedDocument\Services;

use Modules\Document\SharedDocument\Contracts\SharedDocumentServiceInterface;
use Modules\Document\SharedDocument\Facades\SharedDocumentRepoFacade;
use Modules\Document\SharedDocument\Models\SharedDocument;
use Illuminate\Database\Eloquent\Collection;

class SharedDocumentService implements SharedDocumentServiceInterface
{
    protected $resource = ['user', 'document'];

    public function getAll(): Collection
    {
        return SharedDocumentRepoFacade::all($this->resource);
    }

    public function getById(int $id): ?SharedDocument
    {
        return SharedDocumentRepoFacade::find($id, $this->resource);
    }

    public function store(array $data): SharedDocument
    {
        return SharedDocumentRepoFacade::create($data);
    }

    public function update(array $data, int $id): SharedDocument
    {
        return SharedDocumentRepoFacade::update($data, $id);
    }

    public function delete(int $id): bool
    {
        return SharedDocumentRepoFacade::delete($id);
    }
}
