<?php

use Illuminate\Support\Facades\Route;
use Modules\Help\RelatedArticle\Controllers\Api\RelatedArticleController;

Route::apiResource('related_articles', RelatedArticleController::class)->middleware(['jwt.cookies']);
