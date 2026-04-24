<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Pathology\Doctor\Controllers\Api\DoctorController;

Route::apiResource('doctors', DoctorController::class)->middleware(['jwt.cookies']);
