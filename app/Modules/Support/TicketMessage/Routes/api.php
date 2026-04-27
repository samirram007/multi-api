<?php

use Illuminate\Support\Facades\Route;
use Modules\Support\TicketMessage\Controllers\Api\TicketMessageController;

Route::apiResource('ticket_messages', TicketMessageController::class)->middleware(['jwt.cookies']);
