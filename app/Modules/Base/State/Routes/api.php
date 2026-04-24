<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Base\State\Controllers\Api\StateController;

Route::apiResource('states', StateController::class);
