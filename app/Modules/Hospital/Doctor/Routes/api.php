<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Hospital\Doctor\Controllers\Api\DoctorController;

Route::apiResource('doctors', DoctorController::class)->middleware(['jwt.cookies']);
