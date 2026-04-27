<?php

use Illuminate\Support\Facades\Route;
use Modules\Pathology\Doctor\Controllers\Api\DoctorController;

Route::apiResource('doctors', DoctorController::class)->middleware(['jwt.cookies']);
