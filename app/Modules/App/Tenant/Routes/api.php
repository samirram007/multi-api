<?php

use Illuminate\Support\Facades\Route;
use Modules\App\Tenant\Controllers\Api\TenantController;

Route::middleware('auth:tenant_api')->group(function () {
    Route::apiResource('tenants', TenantController::class);

});

// Route::post('login', [TenantAuthController::class, 'login']);
