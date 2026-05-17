<?php

use Illuminate\Support\Facades\Route;
use Modules\App\AliBaba\Controllers\Api\AliBabaController;

Route::apiResource('ali_babas', AliBabaController::class)->middleware(['jwt.cookies']);
