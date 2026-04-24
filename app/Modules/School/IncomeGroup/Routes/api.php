<?php

use Illuminate\Support\Facades\Route;
use App\Modules\School\IncomeGroup\Controllers\Api\IncomeGroupController;

Route::apiResource('income_groups', IncomeGroupController::class)->middleware(['jwt.cookies']);
