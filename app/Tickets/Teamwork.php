<?php

namespace App\Tickets;

use App\Services\Teamwork\Models\Person;
use App\Services\Teamwork\Models\Project;
use App\Services\Teamwork\Teamwork as TeamworkService;
use Illuminate\Http\Request;

class Teamwork extends Ticket {

    public function send(Request $request) {

        // Create Teamwork service
        $teamwork = new TeamworkService($this->delivery_method->teamwork_subdomain, $this->delivery_method->teamwork_token);

        // Create the project
        $project = (new Project())
            ->setName($request->get('subject'))
            ->setUseBilling(false)
            ->setUseTime(false)
            ->setUseRiskRegister(false)
            ->setUseMilestones(false)
            ->setUseNotebook(false)
            ->setUseLinks(false);

        $project = $teamwork->projects()->save($project);

        // Get person
        $person = $teamwork->people()->findByEmail($request->get('email'));

        if (!$person)
            $person = $teamwork->people()->create(
                (new Person())
                    ->makeContact()
                    ->setUserName($request->get('email'))
                    ->setFirstName($request->get('first_name'))
                    ->setLastName($request->get('last_name'))
                    ->setEmailAddress($request->get('email'))
            );


        // Add requester


        // Add file(s)


    }

}