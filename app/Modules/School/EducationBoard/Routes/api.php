<?php

use Illuminate\Support\Facades\Route;
use Modules\School\EducationBoard\Controllers\Api\EducationBoardController;

Route::apiResource('education_boards', EducationBoardController::class)->middleware(['jwt.cookies', 'tenant']);
