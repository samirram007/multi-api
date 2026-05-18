<?php

namespace Modules\School\BookModule\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class BookModuleResource extends SuccessResource
{
        public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'bookId' => $this->book_id,
            'name' => $this->name,
            'description' => $this->description,
            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}
