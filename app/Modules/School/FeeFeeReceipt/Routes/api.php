<?php

use Illuminate\Support\Facades\Route;
use Modules\School\FeeFeeReceipt\Controllers\Api\FeeFeeReceiptController;

Route::apiResource('fee_fee_receipts', FeeFeeReceiptController::class)->middleware(['jwt.cookies']);
