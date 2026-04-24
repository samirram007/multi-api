<?php

use Illuminate\Support\Facades\Route;
use App\Modules\School\Floor\Controllers\Api\FloorController;

Route::apiResource('floors', FloorController::class)->middleware(['jwt.cookies']);
