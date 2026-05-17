<?php

use Illuminate\Support\Facades\Route;
use Modules\Ap\AliBaba\Controllers\Api\AliBabaController;

Route::apiResource('ali_babas', AliBabaController::class)->middleware(['jwt.cookies']);
