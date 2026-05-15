<?php

use Illuminate\Support\Facades\Route;
use Modules\School\Subject\Controllers\Api\SubjectController;

Route::apiResource('subjects', SubjectController::class)->middleware(['jwt.cookies']);
