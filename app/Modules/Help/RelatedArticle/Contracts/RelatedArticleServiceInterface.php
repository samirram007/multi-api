<?php

namespace Modules\Help\RelatedArticle\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Modules\Help\RelatedArticle\Models\RelatedArticle;

interface RelatedArticleServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?RelatedArticle;
    public function store(array $data): RelatedArticle;
    public function update(array $data, int $id): RelatedArticle;
    public function delete(int $id): bool;
}
