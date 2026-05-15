<?php

use Illuminate\Support\Facades\Route;
use Modules\School\Section\Controllers\Api\SectionController;

Route::apiResource('sections', SectionController::class)->middleware(['jwt.cookies']);
