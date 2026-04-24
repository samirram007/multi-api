<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Maintenance\Restore\Controllers\Api\RestoreController;

Route::apiResource('restores', RestoreController::class)->middleware(['jwt.cookies']);
