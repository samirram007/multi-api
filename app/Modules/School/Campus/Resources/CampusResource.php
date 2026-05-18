<?php

namespace Modules\School\Campus\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class CampusResource extends SuccessResource
{
        public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'companyId' => $this->company_id,
            'educationBoardId' => $this->education_board_id,
            'name' => $this->name,
            'code' => $this->code,
            'contactNo' => $this->contact_no,
            'email' => $this->email,
            'establishmentDate' => $this->establishment_date?->toISOString(),
            'openingTime' => $this->opening_time,
            'closingTime' => $this->closing_time,
            'logoImageId' => $this->logo_image_id,
            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}
