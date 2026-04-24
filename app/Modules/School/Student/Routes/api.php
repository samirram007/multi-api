<?php

use Illuminate\Support\Facades\Route;
use App\Modules\School\Student\Controllers\Api\StudentController;

Route::apiResource('students', StudentController::class)->middleware(['jwt.cookies']);
