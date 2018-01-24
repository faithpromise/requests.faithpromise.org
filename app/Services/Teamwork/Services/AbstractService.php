<?php

namespace App\Services\Teamwork\Services;

use App\Services\Teamwork\Client;

class AbstractService {

    protected $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

}