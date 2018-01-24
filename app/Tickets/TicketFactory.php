<?php

namespace App\Tickets;

use App\Models\DeliveryMethod;

class TicketFactory {

    public static function create(DeliveryMethod $method) {

        $class_name = '\\App\\Tickets\\' . studly_case($method->ticket_type);

        return new $class_name($method);
    }

}