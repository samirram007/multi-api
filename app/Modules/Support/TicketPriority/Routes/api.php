<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Support\TicketPriority\Controllers\Api\TicketPriorityController;

Route::apiResource('ticket_priorities', TicketPriorityController::class)->middleware(['jwt.cookies']);
