<?php

namespace Modules\School\Expense\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class ExpenseResource extends SuccessResource
{
        public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'status' => $this->status,
            'expenseDate' => $this->expense_date?->toISOString(),
            'expenseNo' => $this->expense_no,
            'paymentMode' => $this->payment_mode,
            'narration' => $this->narration,
            'paidAmount' => $this->paid_amount,
            'voucherNo' => $this->voucher_no,
            'userId' => $this->user_id,
            'users' => $this->users,
            'balanceAmount' => $this->balance_amount,
            'totalAmount' => $this->total_amount,
            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}
