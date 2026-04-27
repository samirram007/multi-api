<?php

use Illuminate\Support\Facades\Route;
use Modules\Support\TicketEvent\Controllers\Api\TicketEventController;

Route::apiResource('ticket_events', TicketEventController::class)->middleware(['jwt.cookies']);
