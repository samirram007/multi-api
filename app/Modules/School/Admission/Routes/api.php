<?php

use Illuminate\Support\Facades\Route;
use App\Modules\School\Admission\Controllers\Api\AdmissionController;

Route::apiResource('admissions', AdmissionController::class)->middleware(['jwt.cookies']);
