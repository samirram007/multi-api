<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Hospital\Patient\Controllers\Api\PatientController;

Route::apiResource('patients', PatientController::class)->middleware(['jwt.cookies']);
