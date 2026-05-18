<?php

namespace Modules\School\Building\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class BuildingResource extends SuccessResource
{
        public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'campusId' => $this->campus_id,
            'capacity' => $this->capacity,
            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}
