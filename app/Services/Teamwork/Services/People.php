<?php

namespace App\Services\Teamwork\Services;

use App\Services\Teamwork\Models\Person;

class People extends AbstractService {

    public function findByEmail($email) {

        $search_result = $this->search($email);
        $people = $search_result->getData()->searchResult->people;

        if (count($people))
            return $this->find($people[0]->id);

        return null;

    }

    public function find($id) {
        $endpoint = '/people/' . $id . '.json';
        $result = $this->client->get($endpoint);

        return new Person($result->getData()->person);
    }

    public function create(Person $person) {

        $result = $this->client->post('/people.json', [
            'person' => $person->toArray(),
        ]);

        return $this->find($result->getData()->id);
    }

    private function search($term) {
        $result = $this->client->get('/search.json', [
            'searchFor'  => 'people',
            'searchTerm' => $term,
        ]);

        return $result;
    }

}