<?php

use Illuminate\Support\Facades\Route;
use Modules\Base\RolePermission\Controllers\Api\RolePermissionController;

Route::apiResource('permissions', RolePermissionController::class)->middleware(['jwt.cookies']);
