<?php

namespace App\Services\Teamwork\Models;

class Person extends AbstractModel {

    protected $id;
    protected $userName;
    protected $userType;
    protected $firstName;
    protected $lastName;
    protected $emailAddress;
    protected $companyId;

    public function getId() {
        return $this->id;
    }

    public function setId($value) {
        $this->id = $value;

        return $this;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function setUserName($value) {
        $this->userName = $value;

        return $this;
    }

    public function getUserType() {
        return $this->userType;
    }

    private function setUserType($value) {
        $this->userType = $value;

        return $this;
    }

    public function makeUser() {
        return $this->setUserType('account');
    }

    public function makeContact() {
        return $this->setUserType('contact');
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($value) {
        $this->firstName = $value;

        return $this;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($value) {
        $this->lastName = $value;

        return $this;
    }

    public function getEmailAddress() {
        return $this->emailAddress;
    }

    public function setEmailAddress($value) {
        $this->emailAddress = $value;

        return $this;
    }

    public function getCompanyId() {
        return $this->companyId;
    }

    public function setCompanyId($value) {
        $this->companyId = $value;

        return $this;
    }

    public function toArray() {

        $data = [];

        if (!empty($this->id))
            $data['id'] = $this->id;

        if (!empty($this->userName))
            $data['user-name'] = $this->userName;

        if (!empty($this->userType))
            $data['user-type'] = $this->userType;

        if (!empty($this->firstName))
            $data['first-name'] = $this->firstName;

        if (!empty($this->lastName))
            $data['last-name'] = $this->lastName;

        if (!empty($this->emailAddress))
            $data['email-address'] = $this->emailAddress;

        if (!empty($this->companyId))
            $data['company-id'] = $this->companyId;

        return $data;
    }

    public function fill($data) {

        $data = (array)$data;

        if (array_key_exists('id', $data))
            $this->setId($data['id']);

        if (array_key_exists('user-name', $data))
            $this->setUserName($data['user-name']);

        if (array_key_exists('user-type', $data))
            $this->setUserType($data['user-type']);

        if (array_key_exists('first-name', $data))
            $this->setFirstName($data['first-name']);

        if (array_key_exists('last-name', $data))
            $this->setLastName($data['last-name']);

        if (array_key_exists('email-address', $data))
            $this->setEmailAddress($data['email-address']);

        if (array_key_exists('company-id', $data))
            $this->setCompanyId($data['company-id']);

        return $this;
    }

}