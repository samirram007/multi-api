<?php

use Illuminate\Support\Facades\Route;
use App\Modules\School\FeeItem\Controllers\Api\FeeItemController;

Route::apiResource('fee_items', FeeItemController::class)->middleware(['jwt.cookies']);
