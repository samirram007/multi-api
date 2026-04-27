<?php

use Illuminate\Support\Facades\Route;
use Modules\School\ExaminationResult\Controllers\Api\ExaminationResultController;

Route::apiResource('examination_results', ExaminationResultController::class)->middleware(['jwt.cookies']);
