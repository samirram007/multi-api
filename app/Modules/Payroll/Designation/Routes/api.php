<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Payroll\Designation\Controllers\Api\DesignationController;

Route::apiResource('designations', DesignationController::class)->middleware(['jwt.cookies']);
