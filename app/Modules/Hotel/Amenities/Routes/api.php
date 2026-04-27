<?php

use Illuminate\Support\Facades\Route;
use Modules\Hotel\Amenities\Controllers\Api\AmenitiesController;

Route::apiResource('amenities', AmenitiesController::class)->middleware(['jwt.cookies']);
