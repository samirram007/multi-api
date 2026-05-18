<?php

namespace Modules\School\EducationBoard\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class EducationBoardResource extends SuccessResource
{
        public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'status' => $this->status,
            'contactNo' => $this->contact_no,
            'email' => $this->email,
            'establishmentDate' => $this->establishment_date?->toISOString(),
            'website' => $this->website,
            'logoImage' => $this->logo_image,
            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}
