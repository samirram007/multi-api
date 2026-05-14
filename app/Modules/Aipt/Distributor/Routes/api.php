<?php

use Illuminate\Support\Facades\Route;
use Modules\Aipt\Distributor\Controllers\Api\DistributorController;

Route::apiResource('distributors', DistributorController::class)->middleware(['jwt.cookies']);
