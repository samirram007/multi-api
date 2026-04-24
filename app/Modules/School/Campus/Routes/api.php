<?php

use Illuminate\Support\Facades\Route;
use App\Modules\School\Campus\Controllers\Api\CampusController;

Route::apiResource('campuses', CampusController::class)->middleware(['jwt.cookies']);
