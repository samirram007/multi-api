<?php

use Illuminate\Support\Facades\Route;
use Modules\Aipt\StockJournal\Controllers\Api\StockJournalController;

Route::apiResource('stock_journals', StockJournalController::class)->middleware(['jwt.cookies']);
