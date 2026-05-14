<?php

use Illuminate\Support\Facades\Route;
use Modules\Aipt\VoucherEntry\Controllers\Api\VoucherEntryController;

Route::apiResource('voucher_entries', VoucherEntryController::class)->middleware(['jwt.cookies']);
