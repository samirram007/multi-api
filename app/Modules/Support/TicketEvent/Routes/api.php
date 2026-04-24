<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Support\TicketEvent\Controllers\Api\TicketEventController;

Route::apiResource('ticket_events', TicketEventController::class)->middleware(['jwt.cookies']);
