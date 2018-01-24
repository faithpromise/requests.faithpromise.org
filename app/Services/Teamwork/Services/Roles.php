<?php

namespace App\Services\Teamwork\Services;

class Roles extends AbstractService {

    public function create(int $project_id, array $user_ids, $name, $description = '') {

        $endpoint = '/projects/' . $project_id . '/roles.json';
        $result = $this->client->post($endpoint, [
            'role' => [
                'users'       => implode(',', $user_ids),
                'name'        => $name,
                'description' => $description,
            ],
        ]);

        return $result->getData();

    }

}