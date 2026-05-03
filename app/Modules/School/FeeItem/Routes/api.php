<?php

use Illuminate\Support\Facades\Route;
use Modules\School\FeeItem\Controllers\Api\FeeItemController;

Route::apiResource('fee_items', FeeItemController::class)->middleware(['jwt.cookies', 'tenant']);
