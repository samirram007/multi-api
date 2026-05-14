<?php

use Illuminate\Support\Facades\Route;
use Modules\Aipt\StorageUnit\Controllers\Api\StorageUnitController;

Route::apiResource('storage_units', StorageUnitController::class)->middleware(['jwt.cookies']);
