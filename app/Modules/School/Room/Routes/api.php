<?php

use Illuminate\Support\Facades\Route;
use Modules\School\Room\Controllers\Api\RoomController;

Route::apiResource('rooms', RoomController::class)->middleware(['jwt.cookies']);
