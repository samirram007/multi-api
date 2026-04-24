<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Worker\Controllers\Api\WorkerController;

Route::apiResource('workers', WorkerController::class)->middleware(['jwt.cookies']);
