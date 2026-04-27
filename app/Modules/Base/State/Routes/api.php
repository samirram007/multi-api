<?php

use Illuminate\Support\Facades\Route;
use Modules\Base\State\Controllers\Api\StateController;

Route::apiResource('states', StateController::class);
