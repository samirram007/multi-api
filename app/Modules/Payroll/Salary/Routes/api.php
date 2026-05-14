<?php

use Illuminate\Support\Facades\Route;
use Modules\Payroll\Salary\Controllers\Api\SalaryController;

Route::apiResource('salaries', SalaryController::class)->middleware(['jwt.cookies']);
