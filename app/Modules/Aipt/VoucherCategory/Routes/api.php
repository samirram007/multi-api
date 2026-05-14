<?php

use Illuminate\Support\Facades\Route;
use Modules\Aipt\VoucherCategory\Controllers\Api\VoucherCategoryController;

Route::apiResource('voucher_categories', VoucherCategoryController::class)->middleware(['jwt.cookies']);
