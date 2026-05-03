<?php

use Illuminate\Support\Facades\Route;
use Modules\Payroll\Department\Controllers\Api\DepartmentController;

Route::apiResource('departments', DepartmentController::class)->middleware(['jwt.cookies', 'tenant']);
