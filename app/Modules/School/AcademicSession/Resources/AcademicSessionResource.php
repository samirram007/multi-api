<?php

namespace Modules\School\AcademicSession\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class AcademicSessionResource extends SuccessResource
{
        public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'campusId' => $this->campus_id,
            'session' => $this->session,
            'startDate' => $this->start_date?->toISOString(),
            'endDate' => $this->end_date?->toISOString(),
            'previousAcademicSessionId' => $this->previous_academic_session_id,
            'nextAcademicSessionId' => $this->next_academic_session_id,
            'currentFeeNo' => $this->current_fee_no,
            'currentExpenseNo' => $this->current_expense_no,
            'currentTransportExpenseNo' => $this->current_transport_expense_no,
            'isCurrent' => $this->is_current,
            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}
