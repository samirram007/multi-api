<?php

use Illuminate\Support\Facades\Route;
use Modules\Payroll\Employee\Controllers\Api\EmployeeController;

Route::apiResource('employees', EmployeeController::class)->middleware(['jwt.cookies']);
