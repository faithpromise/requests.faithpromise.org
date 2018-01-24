<?php

namespace App\Services\Teamwork;

use App\Services\Teamwork\Services\People;
use App\Services\Teamwork\Services\Projects;

class Teamwork {

    protected $client;

    public function __construct($subdomain, $token) {
        $this->client = new Client($subdomain, $token);
    }

    public function people() {
        return new People($this->client);
    }

    public function projects() {
        return new Projects($this->client);
    }

}