<?php

namespace App\Services\Teamwork;

use GuzzleHttp\Client as Guzzle;
use League\Uri\Components\Query;
use League\Uri\Uri;
use Psr\Http\Message\ResponseInterface;

class Client {

    /** @var ResponseInterface $response */
    protected $response;

    /** @var Guzzle $client */
    protected $client;

    public function __construct($subdomain, $token) {

        $this->client = new Guzzle([
            'base_uri' => 'https://' . $subdomain . '.teamwork.com',
            'auth'     => [$token, 'X'],
        ]);

    }

    public function get($endpoint, $params = []) {

        $query = Query::createFromPairs($params);
        $uri = Uri::createFromComponents(['path' => $endpoint, 'query' => $query->getContent()]);

        $this->response = $this->client->get((string)$uri);

        return $this;
    }

    public function post($endpoint, $params = []) {

        $this->response = $this->client->post($endpoint, [
            'body' => json_encode($params),
        ]);

        return $this;

    }

    public function put($endpoint, $params = []) {

        $this->response = $this->client->post($endpoint, [
            'body' => json_encode($params),
        ]);

        return $this;

    }

    public function getData() {
        return $this->response ? json_decode($this->response->getBody()->getContents()) : null;
    }

    public function getStatus() {
        return $this->response ? $this->response->getStatusCode() : null;
    }

}