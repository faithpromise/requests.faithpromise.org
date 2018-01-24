<?php

namespace App\Services\Teamwork\Models;

class Company {

    private $id;
    private $canSeePrivate;
    private $companyNameUrl;
    private $name;
    private $addressOne;
    private $addressTwo;
    private $city;
    private $state;
    private $zip;
    private $country;
    private $website;
    private $phone;
    private $fax;

    public function getId() {
        return $this->id;
    }

    public function setId($value) {
        $this->id = $value;

        return $this;
    }

    public function getCanSeePrivate() {
        return $this->canSeePrivate;
    }

    public function setCanSeePrivate($value) {
        $this->canSeePrivate = $value;

        return $this;
    }

    public function getCompanyNameUrl() {
        return $this->companyNameUrl;
    }

    public function setCompanyNameUrl($value) {
        $this->companyNameUrl = $value;

        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;

        return $this;
    }

    public function getAddressOne() {
        return $this->addressOne;
    }

    public function setAddressOne($value) {
        $this->addressOne = $value;

        return $this;
    }

    public function getAddressTwo() {
        return $this->addressTwo;
    }

    public function setAddressTwo($value) {
        $this->addressTwo = $value;

        return $this;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($value) {
        $this->city = $value;

        return $this;
    }

    public function getState() {
        return $this->state;
    }

    public function setState($value) {
        $this->state = $value;

        return $this;
    }

    public function getZip() {
        return $this->zip;
    }

    public function setZip($value) {
        $this->zip = $value;

        return $this;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setCountry($value) {
        $this->country = $value;

        return $this;
    }

    public function getWebsite() {
        return $this->website;
    }

    public function setWebsite($value) {
        $this->website = $value;

        return $this;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($value) {
        $this->phone = $value;

        return $this;
    }

    public function getFax() {
        return $this->fax;
    }

    public function setFax($value) {
        $this->fax = $value;

        return $this;
    }

    public function fill($data) {

        $data = (array)$data;

        if (array_key_exists('id', $data))
            $this->id = $data['id'];

        if (array_key_exists('can_see_private', $data))
            $this->canSeePrivate = $data['can_see_private'];

        if (array_key_exists('company_name_url', $data))
            $this->companyNameUrl = $data['company_name_url'];

        if (array_key_exists('name', $data))
            $this->name = $data['name'];

        if (array_key_exists('address_one', $data))
            $this->addressOne = $data['address_one'];

        if (array_key_exists('address_two', $data))
            $this->addressTwo = $data['address_two'];

        if (array_key_exists('city', $data))
            $this->city = $data['city'];

        if (array_key_exists('state', $data))
            $this->state = $data['state'];

        if (array_key_exists('zip', $data))
            $this->zip = $data['zip'];

        if (array_key_exists('country', $data))
            $this->country = $data['country'];

        if (array_key_exists('website', $data))
            $this->website = $data['website'];

        if (array_key_exists('phone', $data))
            $this->phone = $data['phone'];

        if (array_key_exists('fax', $data))
            $this->fax = $data['fax'];

        return $this;

    }

    public function toArray() {

        $data = [
            'name' => $this->name,
        ];

        if (!empty($this->id))
            $data['id'] = $this->id;

        if (!empty($this->canSeePrivate))
            $data['can_see_private'] = $this->canSeePrivate;

        if (!empty($this->companyNameUrl))
            $data['company_name_url'] = $this->companyNameUrl;

        if (!empty($this->name))
            $data['name'] = $this->name;

        if (!empty($this->addressOne))
            $data['address_one'] = $this->addressOne;

        if (!empty($this->addressTwo))
            $data['address_two'] = $this->addressTwo;

        if (!empty($this->city))
            $data['city'] = $this->city;

        if (!empty($this->state))
            $data['state'] = $this->state;

        if (!empty($this->zip))
            $data['zip'] = $this->zip;

        if (!empty($this->country))
            $data['country'] = $this->country;

        if (!empty($this->website))
            $data['website'] = $this->website;

        if (!empty($this->phone))
            $data['phone'] = $this->phone;

        if (!empty($this->fax))
            $data['fax'] = $this->fax;

        return $data;
    }

}