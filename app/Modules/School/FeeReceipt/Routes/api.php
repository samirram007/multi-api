<?php

use Illuminate\Support\Facades\Route;
use Modules\School\FeeReceipt\Controllers\Api\FeeReceiptController;

Route::apiResource('fee_receipts', FeeReceiptController::class)->middleware(['jwt.cookies']);
