<?php

use Illuminate\Support\Facades\Route;
use Modules\Aipt\CostCategory\Controllers\Api\CostCategoryController;

Route::apiResource('cost_categories', CostCategoryController::class)->middleware(['jwt.cookies']);
