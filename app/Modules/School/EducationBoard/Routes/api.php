<?php

use Illuminate\Support\Facades\Route;
use App\Modules\School\EducationBoard\Controllers\Api\EducationBoardController;

Route::apiResource('education_boards', EducationBoardController::class)->middleware(['jwt.cookies']);
