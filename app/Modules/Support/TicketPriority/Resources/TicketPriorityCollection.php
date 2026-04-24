<?php

namespace App\Modules\Support\TicketPriority\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\SuccessCollection;

class TicketPriorityCollection extends SuccessCollection
{

         /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
