<?php

namespace App\Tickets;

use App\Mail\TicketCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class Email extends Ticket {

    public function send(Request $request) {
        $ticket = (object)$request->all();
        Mail::send(new TicketCreated($ticket, $this->delivery_method));
    }

}