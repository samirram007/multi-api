<?php

use Illuminate\Support\Facades\Route;
use Modules\School\BookChapter\Controllers\Api\BookChapterController;

Route::apiResource('book_chapters', BookChapterController::class)->middleware(['jwt.cookies']);
