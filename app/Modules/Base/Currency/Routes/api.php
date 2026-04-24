<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Base\Currency\Controllers\Api\CurrencyController;

Route::apiResource('currencies', CurrencyController::class);
