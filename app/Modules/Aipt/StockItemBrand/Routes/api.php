<?php

use Illuminate\Support\Facades\Route;
use Modules\Aipt\StockItemBrand\Controllers\Api\StockItemBrandController;

Route::apiResource('stock_item_brands', StockItemBrandController::class)->middleware(['jwt.cookies']);
