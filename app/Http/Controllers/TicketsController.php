<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMethod;
use App\Tickets\TicketFactory;
use Illuminate\Http\Request;

class TicketsController extends Controller {

    public function store(Request $request) {

        $this->validate($request, [
            'name'        => 'required',
            'email'       => 'required',
            'message'     => 'required',
            'ticket_type' => 'required',
        ]);

        $delivery_methods = DeliveryMethod::where('ticket_type', '=', $request->get('ticket_type'))->get();

        foreach ($delivery_methods as $method) {
            $ticket = TicketFactory::create($method);
            $ticket->send($request);
        }

        return ['success' => true];
    }

}
