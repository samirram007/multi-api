<?php

use Illuminate\Support\Facades\Route;
use Modules\App\App\Controllers\Api\AppController;

Route::apiResource('apps', AppController::class)->middleware(['jwt.cookies']);
