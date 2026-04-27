<?php

use Illuminate\Support\Facades\Route;
use Modules\School\Examination\Controllers\Api\ExaminationController;

Route::apiResource('examinations', ExaminationController::class)->middleware(['jwt.cookies']);
