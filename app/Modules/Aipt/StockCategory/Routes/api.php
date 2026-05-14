<?php

use Illuminate\Support\Facades\Route;
use Modules\Aipt\StockCategory\Controllers\Api\StockCategoryController;

Route::apiResource('stock_categories', StockCategoryController::class)->middleware(['jwt.cookies']);
