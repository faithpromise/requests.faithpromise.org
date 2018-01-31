<?php

namespace App\Tickets;

use App\Models\DeliveryMethod;
use Zendesk\API\HttpClient as ZendeskAPI;

class Zendesk extends Ticket {

    protected $zendesk_client;

    public function __construct(array $data, DeliveryMethod $method) {

        $this->zendesk_client = new ZendeskAPI($method->zendesk_subdomain);
        $this->zendesk_client->setAuth('basic', ['username' => $method->zendesk_username, 'token' => $method->zendesk_token]);

        parent::__construct($data, $method);

    }

    public function send() {

        $assignee_id = $this->getAssigneeId();
        $requester_id = $this->getRequesterId();

        $ticket = [
            'type'         => 'task',
            'subject'      => $this->getSubject(),
            'comment'      => [
                'body' => $this->getExtendedMessage(),
            ],
            'requester_id' => $requester_id,
            'assignee_id'  => $assignee_id,
            'priority'     => 'normal',
        ];

        $this->zendesk_client->tickets()->create($ticket);

    }

    private function getAssigneeId() {
        $search = $this->zendesk_client->users()->search(['query' => $this->delivery_method->email]);
        return $search->users[0]->id;
    }

    private function getRequesterId() {

        $search = $this->zendesk_client->users()->search(['query' => $this->getEmail()]);

        if (count($search->users))
            return $search->users[0]->id;

        $response = $this->zendesk_client->users()->create([
            'name'     => $this->getName(),
            'email'    => $this->getEmail(),
            'verified' => true,
        ]);

        return $response->user->id;

    }

}