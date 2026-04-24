<?php

use Illuminate\Support\Facades\Route;
use App\Modules\School\Teacher\Controllers\Api\TeacherController;

Route::apiResource('teachers', TeacherController::class)->middleware(['jwt.cookies']);
