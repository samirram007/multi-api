<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Resturant\Order\Controllers\Api\OrderController;

Route::apiResource('orders', OrderController::class)->middleware(['jwt.cookies']);
