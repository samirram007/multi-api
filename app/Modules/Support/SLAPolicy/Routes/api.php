<?php

use Illuminate\Support\Facades\Route;
use Modules\Support\SLAPolicy\Controllers\Api\SLAPolicyController;

Route::apiResource('s_l_a_policies', SLAPolicyController::class)->middleware(['jwt.cookies']);
