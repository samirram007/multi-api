<?php

use Illuminate\Support\Facades\Route;
use Modules\Support\TicketType\Controllers\Api\TicketTypeController;

Route::apiResource('ticket_types', TicketTypeController::class);
