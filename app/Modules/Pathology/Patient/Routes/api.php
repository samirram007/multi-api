<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Pathology\Patient\Controllers\Api\PatientController;

Route::apiResource('patients', PatientController::class)->middleware(['jwt.cookies']);
