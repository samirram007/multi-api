<?php

use Illuminate\Support\Facades\Route;
use Modules\Aipt\Supplier\Controllers\Api\SupplierController;

Route::apiResource('suppliers', SupplierController::class)->middleware(['jwt.cookies']);
