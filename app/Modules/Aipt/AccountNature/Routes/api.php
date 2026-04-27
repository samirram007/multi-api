<?php

use Illuminate\Support\Facades\Route;
use Modules\Aipt\AccountNature\Controllers\Api\AccountNatureController;

Route::apiResource('account_natures', AccountNatureController::class)
->middleware('jwt.cookies');
