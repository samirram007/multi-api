<?php

use Illuminate\Support\Facades\Route;
use App\Modules\School\ExaminationType\Controllers\Api\ExaminationTypeController;

Route::apiResource('examination_types', ExaminationTypeController::class)->middleware(['jwt.cookies']);
