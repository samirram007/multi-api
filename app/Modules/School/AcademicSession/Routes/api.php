<?php

use Illuminate\Support\Facades\Route;
use Modules\School\AcademicSession\Controllers\Api\AcademicSessionController;

Route::apiResource('academic_sessions', AcademicSessionController::class)->middleware(['jwt.cookies', 'tenant']);
