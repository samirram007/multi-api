<?php

use Modules\Aipt\StockItem\Controllers\Api\ItemPriceController;
use Illuminate\Support\Facades\Route;
use Modules\Aipt\StockItem\Controllers\Api\StockItemController;

Route::apiResource('stock_items', StockItemController::class)->middleware(['jwt.cookies']);
Route::get('purchasable_stock_items', [StockItemController::class, 'purchasable_stock_items'])->middleware(['jwt.cookies']);

