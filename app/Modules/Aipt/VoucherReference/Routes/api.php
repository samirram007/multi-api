<?php

use Illuminate\Support\Facades\Route;
use Modules\Aipt\VoucherReference\Controllers\Api\VoucherReferenceController;

Route::apiResource('voucher_references', VoucherReferenceController::class)->middleware(['jwt.cookies']);
