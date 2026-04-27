<?php

use Illuminate\Support\Facades\Route;
use Modules\App\Menu\Controllers\Api\MenuController;

Route::apiResource('menus', MenuController::class)->middleware(['jwt.cookies']);
