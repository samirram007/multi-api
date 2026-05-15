<?php

use Illuminate\Support\Facades\Route;
use Modules\School\Month\Controllers\Api\MonthController;

Route::apiResource('months', MonthController::class)->middleware(['jwt.cookies']);
