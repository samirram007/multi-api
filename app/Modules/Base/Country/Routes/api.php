<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Base\Country\Controllers\Api\CountryController;

Route::apiResource('countries', CountryController::class);
