<?php

use Illuminate\Support\Facades\Route;
use Modules\School\FeeTemplateItem\Controllers\Api\FeeTemplateItemController;

Route::apiResource('fee_template_items', FeeTemplateItemController::class)->middleware(['jwt.cookies']);
