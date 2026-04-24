<?php

use Illuminate\Support\Facades\Route;
use App\Modules\School\ExpenseGroup\Controllers\Api\ExpenseGroupController;

Route::apiResource('expense_groups', ExpenseGroupController::class)->middleware(['jwt.cookies']);
