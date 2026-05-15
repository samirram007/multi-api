<?php

use Illuminate\Support\Facades\Route;
use Modules\School\BookModule\Controllers\Api\BookModuleController;

Route::apiResource('book_modules', BookModuleController::class)->middleware(['jwt.cookies']);
