<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Document\Document\Controllers\Api\DocumentController;

Route::middleware(['jwt.cookies'])->prefix('documents')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Basic CRUD
    |--------------------------------------------------------------------------
    */

    Route::get('/', [DocumentController::class, 'index']);        // list
    Route::post('/', [DocumentController::class, 'store']);       // upload
    Route::get('/{id}', [DocumentController::class, 'show'])->whereNumber('id');     // single
    Route::put('/{id}', [DocumentController::class, 'update']);   // update
    Route::delete('/{id}', [DocumentController::class, 'destroy']);// delete

    Route::delete('/', [DocumentController::class, 'bulkDelete']); // bulk delete

    /*
    |--------------------------------------------------------------------------
    | File Handling
    |--------------------------------------------------------------------------
    */

    Route::get('/{id}/download', [DocumentController::class, 'download']);

    /*
    |--------------------------------------------------------------------------
    | Tree / Navigation
    |--------------------------------------------------------------------------
    */

    Route::get('/root', [DocumentController::class, 'root']);              // root folders
    Route::get('/{id}/children', [DocumentController::class, 'children'])->whereNumber('id'); // folder contents
    Route::get('/{id}/path', [DocumentController::class, 'path'])->whereNumber('id');         // breadcrumb

    /*
    |--------------------------------------------------------------------------
    | Folder Operations
    |--------------------------------------------------------------------------
    */

    Route::post('/folder', [DocumentController::class, 'createFolder']);
    Route::put('/{id}/move', [DocumentController::class, 'move'])->whereNumber('id');
    Route::put('/{id}/rename', [DocumentController::class, 'rename'])->whereNumber('id');

    /*
    |--------------------------------------------------------------------------
    | Search / Filters
    |--------------------------------------------------------------------------
    */

    Route::get('/search', [DocumentController::class, 'search']);
    Route::get('/type/{type}', [DocumentController::class, 'getByType']);
});
