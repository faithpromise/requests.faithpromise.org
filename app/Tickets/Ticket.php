<?php

namespace App\Tickets;

use App\Models\DeliveryMethod;

abstract class Ticket {

    protected $delivery_method;

    public function __construct(DeliveryMethod $method) {
        $this->delivery_method = $method;
    }

}