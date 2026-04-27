<?php

use Illuminate\Support\Facades\Route;
use Modules\Support\TicketEventType\Controllers\Api\TicketEventTypeController;

Route::apiResource('ticket_event_types', TicketEventTypeController::class)->middleware(['jwt.cookies']);
