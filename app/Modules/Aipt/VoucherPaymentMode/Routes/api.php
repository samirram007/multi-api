<?php

use Illuminate\Support\Facades\Route;
use Modules\Aipt\VoucherPaymentMode\Controllers\Api\VoucherPaymentModeController;

Route::apiResource('voucher_payment_modes', VoucherPaymentModeController::class)->middleware(['jwt.cookies']);
