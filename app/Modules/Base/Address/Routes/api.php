<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Base\Address\Controllers\Api\AddressController;

Route::apiResource('addresses', AddressController::class)->middleware(['jwt.cookies']);
