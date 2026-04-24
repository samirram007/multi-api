<?php

namespace App\Modules\Base\Auth\Resources;

use App\Http\Resources\SuccessCollection;

class AuthCollection extends SuccessCollection
{
    public function __construct($resource, string $message = null)
    {
        parent::__construct(
            AuthResource::collection($resource),
            $message ?? 'Auth records fetched successfully'
        );
    }
}
