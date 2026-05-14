<?php

use Illuminate\Support\Facades\Route;
use Modules\Aipt\StockItemSerial\Controllers\Api\StockItemSerialController;

Route::apiResource('stock_item_serials', StockItemSerialController::class)->middleware(['jwt.cookies']);
