<?php

use Illuminate\Support\Facades\Route;
use App\Modules\WorkerMod\Controllers\Api\WorkerModController;

Route::apiResource('worker_mods', WorkerModController::class)->middleware(['jwt.cookies']);
