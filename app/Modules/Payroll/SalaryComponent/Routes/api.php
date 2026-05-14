<?php

use Illuminate\Support\Facades\Route;
use Modules\Payroll\SalaryComponent\Controllers\Api\SalaryComponentController;

Route::apiResource('salary_components', SalaryComponentController::class)->middleware(['jwt.cookies']);
