<?php

namespace Modules\School\Book\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class BookResource extends SuccessResource
{
        public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'subjectId' => $this->subject_id,
            'publicationYear' => $this->publication_year,
            'pageCount' => $this->page_count,
            'price' => $this->price,
            'publishedAt' => $this->published_at?->toISOString(),
            'publisher' => $this->publisher,
            'author' => $this->author,
            'illustrator' => $this->illustrator,
            'translator' => $this->translator,
            'coverImageId' => $this->cover_image_id,
            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}
