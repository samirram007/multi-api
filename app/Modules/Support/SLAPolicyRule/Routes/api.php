<?php

use Illuminate\Support\Facades\Route;
use Modules\Support\SLAPolicyRule\Controllers\Api\SLAPolicyRuleController;

Route::apiResource('s_l_a_policy_rules', SLAPolicyRuleController::class)->middleware(['jwt.cookies']);
