<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Payroll\EmployeeGroup\Controllers\Api\EmployeeGroupController;

Route::apiResource('employee_groups', EmployeeGroupController::class)->middleware(['jwt.cookies']);
