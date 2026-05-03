<?php

use Illuminate\Support\Facades\Route;
use Modules\School\ExaminationStandard\Controllers\Api\ExaminationStandardController;

Route::apiResource('examination_standards', ExaminationStandardController::class)->middleware(['jwt.cookies', 'tenant']);
