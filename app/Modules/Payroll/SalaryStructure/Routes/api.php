<?php

use Illuminate\Support\Facades\Route;
use Modules\Payroll\SalaryStructure\Controllers\Api\SalaryStructureController;

Route::apiResource('salary_structures', SalaryStructureController::class)->middleware(['jwt.cookies']);
