<?php

use Illuminate\Support\Facades\Route;
use App\Modules\School\ExaminationSchedule\Controllers\Api\ExaminationScheduleController;

Route::apiResource('examination_schedules', ExaminationScheduleController::class)->middleware(['jwt.cookies']);
