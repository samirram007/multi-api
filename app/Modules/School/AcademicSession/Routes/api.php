<?php

use Illuminate\Support\Facades\Route;
use App\Modules\School\AcademicSession\Controllers\Api\AcademicSessionController;

Route::apiResource('academic_sessions', AcademicSessionController::class)->middleware(['jwt.cookies']);
