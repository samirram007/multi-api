<?php

use Illuminate\Support\Facades\Route;
use App\Modules\School\FeeTemplate\Controllers\Api\FeeTemplateController;

Route::apiResource('fee_templates', FeeTemplateController::class)->middleware(['jwt.cookies']);
