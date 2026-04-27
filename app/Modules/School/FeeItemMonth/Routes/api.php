<?php

use Illuminate\Support\Facades\Route;
use Modules\School\FeeItemMonth\Controllers\Api\FeeItemMonthController;

Route::apiResource('fee_item_months', FeeItemMonthController::class)->middleware(['jwt.cookies']);
