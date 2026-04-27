<?php

use Illuminate\Support\Facades\Route;
use Modules\Hotel\Booking\Controllers\Api\BookingController;

Route::apiResource('bookings', BookingController::class)->middleware(['jwt.cookies']);
