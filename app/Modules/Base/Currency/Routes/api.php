<?php

use Illuminate\Support\Facades\Route;
use Modules\Base\Currency\Controllers\Api\CurrencyController;

Route::apiResource('currencies', CurrencyController::class);
