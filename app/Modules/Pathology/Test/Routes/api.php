<?php

use Illuminate\Support\Facades\Route;
use Modules\Pathology\Test\Controllers\Api\TestController;

Route::apiResource('tests', TestController::class)->middleware(['jwt.cookies']);
