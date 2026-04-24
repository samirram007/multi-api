<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Base\User\Controllers\Api\UserController;


Route::apiResource('users', UserController::class)->middleware(['jwt.cookies']);

