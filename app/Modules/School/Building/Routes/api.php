<?php

use Illuminate\Support\Facades\Route;
use Modules\School\Building\Controllers\Api\BuildingController;

Route::apiResource('buildings', BuildingController::class)->middleware(['jwt.cookies', 'tenant']);
