<?php

use Illuminate\Support\Facades\Route;
use Modules\Aipt\Holiday\Controllers\Api\HolidayController;

Route::apiResource('holidays', HolidayController::class)->middleware(['jwt.cookies']);
