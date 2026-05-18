<?php

use Illuminate\Support\Facades\Route;
use Modules\App\TenantAuth\Controllers\Api\TenantAuthController;


// Route::post('tenant_login', [TenantAuthController::class, 'login']);
// Route::post('tenant_register', [TenantAuthController::class, 'register']);
// Route::apiResource('tenant_profile', TenantAuthController::class)->middleware(['jwt.tenant.cookies']);



Route::prefix('onboarding')->group(function () {
    // Route::middleware('auth:tenant_api')->group(function () {
    //     Route::get('me', [TenantAuthController::class, 'me']);
    //     Route::get('profile', [TenantAuthController::class, 'profile']);
    // });
    Route::get('profile', [TenantAuthController::class, 'profile'])->middleware(['jwt.tenant.cookies']);
    Route::get('logout', [TenantAuthController::class, 'logout'])->middleware(['jwt.tenant.cookies']);
    Route::post('register', [TenantAuthController::class, 'register']);
    Route::post('login', [TenantAuthController::class, 'login']);
});

