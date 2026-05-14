<?php

use Illuminate\Support\Facades\Route;
use Modules\Aipt\VoucherClassification\Controllers\Api\VoucherClassificationController;

Route::apiResource('voucher_classifications', VoucherClassificationController::class)->middleware(['jwt.cookies']);
