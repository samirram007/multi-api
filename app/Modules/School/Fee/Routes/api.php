<?php

use Illuminate\Support\Facades\Route;
use Modules\School\Fee\Controllers\Api\FeeController;

Route::apiResource('fees', FeeController::class)->middleware(['jwt.cookies']);
