<?php

use Illuminate\Support\Facades\Route;
use Modules\Aipt\Vendor\Controllers\Api\VendorController;

Route::apiResource('vendors', VendorController::class)->middleware(['jwt.cookies']);
