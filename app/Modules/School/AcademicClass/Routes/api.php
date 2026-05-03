<?php

use Illuminate\Support\Facades\Route;
use Modules\School\AcademicClass\Controllers\Api\AcademicClassController;

Route::apiResource('academic_classes', AcademicClassController::class)->middleware(['jwt.cookies', 'tenant']);
