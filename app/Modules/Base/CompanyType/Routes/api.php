<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Base\CompanyType\Controllers\Api\CompanyTypeController;

Route::apiResource('company_types', CompanyTypeController::class)
->middleware('jwt.cookies');
