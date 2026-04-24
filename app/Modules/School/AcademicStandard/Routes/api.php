<?php

use Illuminate\Support\Facades\Route;
use App\Modules\School\AcademicStandard\Controllers\Api\AcademicStandardController;

Route::apiResource('academic_standards', AcademicStandardController::class)->middleware(['jwt.cookies']);
