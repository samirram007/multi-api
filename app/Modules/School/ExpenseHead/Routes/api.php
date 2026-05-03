<?php

use Illuminate\Support\Facades\Route;
use Modules\School\ExpenseHead\Controllers\Api\ExpenseHeadController;

Route::apiResource('expense_heads', ExpenseHeadController::class)->middleware(['jwt.cookies', 'tenant']);
