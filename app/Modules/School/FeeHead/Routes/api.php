<?php

use Illuminate\Support\Facades\Route;
use App\Modules\School\FeeHead\Controllers\Api\FeeHeadController;

Route::apiResource('fee_heads', FeeHeadController::class)->middleware(['jwt.cookies']);
