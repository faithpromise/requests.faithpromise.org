<?php

namespace App\Http\Controllers;

use App\Mail\TicketReceipt;
use App\Models\DeliveryMethod;
use App\Tickets\TicketFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketsController extends Controller {

    public function store(Request $request) {

        $this->validate($request, [
            'name'        => 'required',
            'email'       => 'required',
            'message'     => 'required',
            'ticket_type' => 'required',
        ]);

        $delivery_methods = DeliveryMethod::where('ticket_type', '=', $request->get('ticket_type'))->orderBy('id')->get();
        $send_receipt = false;

        foreach ($delivery_methods as $method) {
            $ticket = TicketFactory::create($request->all(), $method);
            $ticket->send();
            $send_receipt = $method->send_receipt || $send_receipt;
        }

        if ($delivery_methods->count() && $send_receipt) {
            Mail::send(new TicketReceipt($ticket, $delivery_methods->first()));
        }

        return ['success' => true];
    }

}
