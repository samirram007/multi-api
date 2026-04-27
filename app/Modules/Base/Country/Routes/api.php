<?php

use Illuminate\Support\Facades\Route;
use Modules\Base\Country\Controllers\Api\CountryController;

Route::apiResource('countries', CountryController::class);
