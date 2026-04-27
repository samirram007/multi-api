<?php

namespace Modules\Help\RelatedArticle\Resources;

use Modules\Help\TopicArticle\Models\TopicArticle;
use Modules\Help\TopicArticle\Resources\TopicArticleMinimumResource;
use Modules\Help\TopicArticle\Resources\TopicArticleResource;
use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class RelatedArticleResource extends SuccessResource
{
    public function toArray(Request $request): array
    {
        return [
            // 'id' => $this->id,
            // 'topicArticleId' => $this->topic_article_id,
            // 'relatedTopicArticleId' => $this->related_topic_article_id,
            'topicArticle' => TopicArticleMinimumResource::make($this->whenLoaded('related_topic_article')),
            // 'relatedTopicArticle' => TopicArticle::make($this->whenLoaded('related_topic_article')),
        ];
    }
}
