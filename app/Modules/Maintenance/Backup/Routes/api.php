<?php

use Illuminate\Support\Facades\Route;
use Modules\Maintenance\Backup\Controllers\Api\BackupController;

Route::apiResource('backups', BackupController::class)->middleware(['jwt.cookies']);
