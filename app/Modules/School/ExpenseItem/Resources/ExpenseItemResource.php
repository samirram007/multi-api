<?php

namespace Modules\School\ExpenseItem\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class ExpenseItemResource extends SuccessResource
{
        public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'status' => $this->status,
            'months' => $this->months,
            'amount' => $this->amount,
            'quantity' => $this->quantity,
            'totalAmount' => $this->total_amount,
            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}
