<?php

use Illuminate\Support\Facades\Route;
use Modules\Aipt\Language\Controllers\Api\LanguageController;

Route::apiResource('languages', LanguageController::class);
