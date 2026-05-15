<?php

use Illuminate\Support\Facades\Route;
use Modules\School\Book\Controllers\Api\BookController;

Route::apiResource('books', BookController::class)->middleware(['jwt.cookies']);
