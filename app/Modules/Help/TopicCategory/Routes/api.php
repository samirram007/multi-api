<?php

use Illuminate\Support\Facades\Route;
use Modules\Help\TopicCategory\Controllers\Api\TopicCategoryController;

Route::apiResource('topic_categories', TopicCategoryController::class)->middleware(['jwt.cookies']);
Route::apiResource('/help_center_topic_categories', TopicCategoryController::class);
Route::get('/help_center_topic_categories/{slug}/slug', [TopicCategoryController::class, 'getBySlug']);

