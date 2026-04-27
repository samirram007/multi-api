<?php

use Illuminate\Support\Facades\Route;
use Modules\Base\Company\Controllers\Api\CompanyController;

Route::apiResource('companies', CompanyController::class)
->middleware('jwt.cookies');
