<?php

namespace App\Mail;

use App\Models\DeliveryMethod;
use App\Tickets\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketCreated extends Mailable {
    use Queueable, SerializesModels;

    public $ticket;
    public $method;

    /**
     * Create a new message instance.
     *
     * @param Ticket $ticket
     * @param DeliveryMethod $method
     */
    public function __construct(Ticket $ticket, $method) {
        $this->ticket = $ticket;
        $this->method = $method;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this
            ->to($this->method->email, $this->method->name)
            ->from($this->ticket->getEmail(), $this->ticket->getName())
            ->subject($this->ticket->getSubject())
            ->text('emails.ticket-received-plain-text');
    }

}
