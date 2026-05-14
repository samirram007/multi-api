<?php

use Illuminate\Support\Facades\Route;
use Modules\Aipt\CostCenter\Controllers\Api\CostCenterController;

Route::apiResource('cost_centers', CostCenterController::class)->middleware(['jwt.cookies']);
