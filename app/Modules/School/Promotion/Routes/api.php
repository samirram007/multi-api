<?php

use Illuminate\Support\Facades\Route;
use Modules\School\Promotion\Controllers\Api\PromotionController;

Route::apiResource('promotions', PromotionController::class)->middleware(['jwt.cookies']);
