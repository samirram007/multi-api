<?php

use Illuminate\Support\Facades\Route;
use Modules\School\StudentSession\Controllers\Api\StudentSessionController;

Route::apiResource('student_sessions', StudentSessionController::class)->middleware(['jwt.cookies']);
