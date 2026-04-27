<?php

namespace Modules\Help\TopicArticle\Resources;

use Modules\Help\RelatedArticle\Resources\RelatedArticleResource;
use Modules\Help\TopicCategory\Resources\TopicCategoryResource;
use Modules\Help\TopicSection\Resources\TopicSectionResource;
use Modules\User\Resources\UserResource;
use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class TopicArticleMinimumResource extends SuccessResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'status' => $this->status,
        ];
    }
}
