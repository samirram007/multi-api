<?php

namespace Modules\App\AliBaba\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\SuccessCollection;

class AliBabaCollection extends SuccessCollection
{
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
