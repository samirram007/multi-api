<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Document\SharedDocument\Controllers\Api\SharedDocumentController;

Route::apiResource('shared_documents', SharedDocumentController::class)->middleware(['jwt.cookies']);
