<?php

use Illuminate\Support\Facades\Route;
use Modules\App\TenantUser\Controllers\Api\TenantUserController;

Route::apiResource('tenant_users', TenantUserController::class)->middleware(['jwt.tenant.cookies']);
