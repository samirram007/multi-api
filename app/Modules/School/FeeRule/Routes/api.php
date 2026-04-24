<?php

use Illuminate\Support\Facades\Route;
use App\Modules\School\FeeRule\Controllers\Api\FeeRuleController;

Route::apiResource('fee_rules', FeeRuleController::class)->middleware(['jwt.cookies']);
