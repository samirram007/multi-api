<?php

use Illuminate\Support\Facades\Route;
use Modules\Resturant\Booking\Controllers\Api\BookingController;

Route::apiResource('bookings', BookingController::class)->middleware(['jwt.cookies']);
