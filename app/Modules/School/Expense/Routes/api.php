<?php

use Illuminate\Support\Facades\Route;
use Modules\School\Expense\Controllers\Api\ExpenseController;

Route::apiResource('expenses', ExpenseController::class)->middleware(['jwt.cookies', 'tenant']);
