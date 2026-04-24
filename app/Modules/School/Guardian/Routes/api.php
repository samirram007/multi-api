<?php

use Illuminate\Support\Facades\Route;
use App\Modules\School\Guardian\Controllers\Api\GuardianController;

Route::apiResource('guardians', GuardianController::class)->middleware(['jwt.cookies']);
