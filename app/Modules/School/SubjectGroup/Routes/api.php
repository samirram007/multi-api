<?php

use Illuminate\Support\Facades\Route;
use Modules\School\SubjectGroup\Controllers\Api\SubjectGroupController;

Route::apiResource('subject_groups', SubjectGroupController::class)->middleware(['jwt.cookies']);
