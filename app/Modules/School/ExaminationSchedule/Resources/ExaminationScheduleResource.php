<?php

namespace Modules\School\ExaminationSchedule\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class ExaminationScheduleResource extends SuccessResource
{
        public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'status' => $this->status,
            'examinationDate' => $this->examination_date?->toISOString(),
            'examinationTime' => $this->examination_time,
            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}
