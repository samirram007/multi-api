<?php

use Illuminate\Support\Facades\Route;
use Modules\School\ExaminationType\Controllers\Api\ExaminationTypeController;

Route::apiResource('examination_types', ExaminationTypeController::class)->middleware(['jwt.cookies', 'tenant']);
