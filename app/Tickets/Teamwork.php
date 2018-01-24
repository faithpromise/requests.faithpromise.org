<?php

namespace App\Tickets;

use App\Services\Teamwork\Models\Person;
use App\Services\Teamwork\Models\Project;
use App\Services\Teamwork\Teamwork as TeamworkService;

class Teamwork extends Ticket {

    public function send($ticket, $files = null) {

        // Create Teamwork service
        $teamwork = new TeamworkService($this->delivery_method->teamwork_subdomain, $this->delivery_method->teamwork_token);

        // Create the project
        $project = (new Project())
            ->setName($ticket['subject'])
            ->setUseBilling(false)
            ->setUseTime(false)
            ->setUseRiskRegister(false)
            ->setUseMilestones(false)
            ->setUseNotebook(false)
            ->setUseLinks(false);

        $project = $teamwork->projects()->save($project);

        // Get person
        $person = $teamwork->people()->findByEmail($ticket['email']);

        if (!$person)
            $person = $teamwork->people()->create(
                (new Person())
                    ->makeContact()
                    ->setUserName($ticket['email'])
                    ->setFirstName($ticket['first_name'])
                    ->setLastName($ticket['last_name'])
                    ->setEmailAddress($ticket['email'])
            );




        // Add requester


        // Add file(s)


    }

}