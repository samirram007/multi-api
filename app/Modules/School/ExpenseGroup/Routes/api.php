<?php

use Illuminate\Support\Facades\Route;
use Modules\School\ExpenseGroup\Controllers\Api\ExpenseGroupController;

Route::apiResource('expense_groups', ExpenseGroupController::class)->middleware(['jwt.cookies', 'tenant']);
