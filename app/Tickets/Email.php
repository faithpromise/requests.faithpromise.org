<?php

namespace App\Tickets;

use App\Mail\TicketCreated;
use Illuminate\Support\Facades\Mail;


class Email extends Ticket {

    public function send() {
        Mail::send(new TicketCreated($this, $this->delivery_method));
    }

}