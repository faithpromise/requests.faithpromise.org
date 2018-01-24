<?php

namespace App\Services\Teamwork\Services;

use App\Services\Teamwork\Models\Project;

class Projects extends AbstractService {

    public function save(Project $project) {
        if ($project->getId())
            return $this->update($project);

        return $this->create($project);
    }

    private function create(Project $project) {

        $result = $this->client->post('/projects.json', [
            'project' => $project->toArray(),
        ]);

        return $result->getData();
    }

    private function update(Project $project) {

        $endpoint = '/projects/' . $project->getId() . '.json';
        $result = $this->client->put($endpoint, [
            'project' => $project->toArray(),
        ]);

        return $result->getData();
    }

}