<?php

use Illuminate\Support\Facades\Route;
use Modules\Maintenance\Restore\Controllers\Api\RestoreController;

Route::apiResource('restores', RestoreController::class)->middleware(['jwt.cookies']);
