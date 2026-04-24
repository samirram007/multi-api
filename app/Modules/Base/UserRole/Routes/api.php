<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Base\UserRole\Controllers\Api\UserRoleController;

Route::apiResource('user_roles', UserRoleController::class)->middleware(['jwt.cookies']);
