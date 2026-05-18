<?php

use Illuminate\Support\Facades\Route;
use Modules\App\Tenant\Controllers\Api\TenantController;

Route::middleware('jwt.tenant.cookies')->group(function () {
    Route::apiResource('tenants', TenantController::class);

});

// Route::post('login', [TenantAuthController::class, 'login']);
