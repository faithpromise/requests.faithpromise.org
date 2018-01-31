<?php

namespace App\Tickets;

use App\Models\DeliveryMethod;

class TicketFactory {

    public static function create(array $ticket_data, DeliveryMethod $method) {

        $class_name = '\\App\\Tickets\\' . studly_case($method->delivery_method);

        return new $class_name($ticket_data, $method);
    }

}