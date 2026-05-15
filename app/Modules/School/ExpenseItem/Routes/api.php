<?php

use Illuminate\Support\Facades\Route;
use Modules\School\ExpenseItem\Controllers\Api\ExpenseItemController;

Route::apiResource('expense_items', ExpenseItemController::class)->middleware(['jwt.cookies']);
