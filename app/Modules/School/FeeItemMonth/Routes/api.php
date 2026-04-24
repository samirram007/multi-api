<?php

use Illuminate\Support\Facades\Route;
use App\Modules\School\FeeItemMonth\Controllers\Api\FeeItemMonthController;

Route::apiResource('fee_item_months', FeeItemMonthController::class)->middleware(['jwt.cookies']);
