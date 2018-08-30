<?php

namespace App\Mail;

use App\Models\DeliveryMethod;
use App\Tickets\Ticket;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketReceipt extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    public $method;
    public $submitted_at;

    /**
     * Create a new message instance.
     *
     * @param Ticket $ticket
     * @param DeliveryMethod $method
     */
    public function __construct(Ticket $ticket, DeliveryMethod $method) {
        $this->ticket = $ticket;
        $this->method = $method;
        $this->submitted_at = Carbon::now('America/New_York')->format('M j');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this
            ->to($this->ticket->getEmail(), $this->ticket->getName())
            ->from($this->method->email, $this->method->name)
            ->subject($this->ticket->getSubject())
            ->text('emails.ticket-receipt-plain-text');
    }
}
