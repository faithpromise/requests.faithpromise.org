<?php

namespace App\Services\Teamwork\Models;

class Project extends AbstractModel {

    protected $id;
    protected $name;
    protected $description;
    protected $companyId;
    protected $newCompany;
    protected $categoryId;
    protected $startDate;
    protected $endDate;
    protected $useTasks;
    protected $useMilestones;
    protected $useMessages;
    protected $useFiles;
    protected $useTime;
    protected $useNotebook;
    protected $useRiskRegister;
    protected $useLinks;
    protected $useBilling;
    protected $startPage;
    protected $harvestTimersEnabled;
    protected $defaultPrivacy;

    public function getId() {
        return $this->id;
    }

    public function setId($value) {
        $this->id = $value;

        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;

        return $this;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($value) {
        $this->description = $value;

        return $this;
    }

    public function getCompanyId() {
        return $this->companyId;
    }

    public function setCompanyId($value) {
        $this->companyId = $value;

        return $this;
    }

    public function getNewCompany() {
        return $this->newCompany;
    }

    public function setNewCompany($value) {
        $this->newCompany = $value;

        return $this;
    }

    public function getCategoryId() {
        return $this->categoryId;
    }

    public function setCategoryId($value) {
        $this->categoryId = $value;

        return $this;
    }

    public function getStartDate() {
        return $this->startDate;
    }

    public function setStartDate($value) {
        $this->startDate = $value;

        return $this;
    }

    public function getEndDate() {
        return $this->endDate;
    }

    public function setEndDate($value) {
        $this->endDate = $value;

        return $this;
    }

    public function getUseTasks() {
        return $this->useTasks;
    }

    public function setUseTasks($value) {
        $this->useTasks = $value ? 1 : 0;

        return $this;
    }

    public function getUseMilestones() {
        return $this->useMilestones;
    }

    public function setUseMilestones($value) {
        $this->useMilestones = $value ? 1 : 0;

        return $this;
    }

    public function getUseMessages() {
        return $this->useMessages;
    }

    public function setUseMessages($value) {
        $this->useMessages = $value ? 1 : 0;

        return $this;
    }

    public function getUseFiles() {
        return $this->useFiles;
    }

    public function setUseFiles($value) {
        $this->useFiles = $value ? 1 : 0;

        return $this;
    }

    public function getUseTime() {
        return $this->useTime;
    }

    public function setUseTime($value) {
        $this->useTime = $value ? 1 : 0;

        return $this;
    }

    public function getUseNotebook() {
        return $this->useNotebook;
    }

    public function setUseNotebook($value) {
        $this->useNotebook = $value ? 1 : 0;

        return $this;
    }

    public function getUseRiskRegister() {
        return $this->useRiskRegister;
    }

    public function setUseRiskRegister($value) {
        $this->useRiskRegister = $value ? 1 : 0;

        return $this;
    }

    public function getUseLinks() {
        return $this->useLinks;
    }

    public function setUseLinks($value) {
        $this->useLinks = $value ? 1 : 0;

        return $this;
    }

    public function getUseBilling() {
        return $this->useBilling;
    }

    public function setUseBilling($value) {
        $this->useBilling = $value ? 1 : 0;

        return $this;
    }

    public function getStartPage() {
        return $this->startPage;
    }

    public function setStartPage($value) {
        $this->startPage = $value;

        return $this;
    }

    public function getHarvestTimersEnabled() {
        return $this->harvestTimersEnabled;
    }

    public function setHarvestTimersEnabled($value) {
        $this->harvestTimersEnabled = $value ? 'true' : 'false';

        return $this;
    }

    public function getDefaultPrivacy() {
        return $this->defaultPrivacy;
    }

    public function setDefaultPrivacy($value) {
        $this->defaultPrivacy = $value;

        return $this;
    }

    public function toArray() {

        $data = [
            'name' => $this->name,
        ];

        if (!empty($this->id))
            $data['id'] = $this->id;

        if (!empty($this->description))
            $data['description'] = $this->description;

        if (!empty($this->companyId))
            $data['companyId'] = $this->companyId;

        if (!empty($this->newCompany))
            $data['newCompany'] = $this->newCompany;

        if (!empty($this->categoryId))
            $data['category-id'] = $this->categoryId;

        if (!empty($this->startDate))
            $data['start-date'] = $this->startDate;

        if (!empty($this->endDate))
            $data['end-date'] = $this->endDate;

        if (!empty($this->useTasks))
            $data['use-tasks'] = $this->useTasks;

        if (!empty($this->useMilestones))
            $data['use-milestones'] = $this->useMilestones;

        if (!empty($this->useMessages))
            $data['use-messages'] = $this->useMessages;

        if (!empty($this->useFiles))
            $data['use-files'] = $this->useFiles;

        if (!empty($this->useTime))
            $data['use-time'] = $this->useTime;

        if (!empty($this->useNotebook))
            $data['use-notebook'] = $this->useNotebook;

        if (!empty($this->useRiskRegister))
            $data['use-riskregister'] = $this->useRiskRegister;

        if (!empty($this->useLinks))
            $data['use-links'] = $this->useLinks;

        if (!empty($this->useBilling))
            $data['use-billing'] = $this->useBilling;

        if (!empty($this->startPage))
            $data['start-page'] = $this->startPage;

        if (!empty($this->harvestTimersEnabled))
            $data['harvest-timers-enabled'] = $this->harvestTimersEnabled;

        if (!empty($this->defaultPrivacy))
            $data['defaultPrivacy'] = $this->defaultPrivacy;

        return $data;
    }

    public function fill($data) {

        if (array_key_exists('id', $data))
            $this->setId($data['id']);

        if (array_key_exists('name', $data))
            $this->setName($data['name']);

        if (array_key_exists('description', $data))
            $this->setDescription($data['description']);

        if (array_key_exists('companyId', $data))
            $this->setCompanyId($data['companyId']);

        if (array_key_exists('newCompany', $data))
            $this->setNewCompany($data['newCompany']);

        if (array_key_exists('category-id', $data))
            $this->setCategoryId($data['category-id']);

        if (array_key_exists('start-date', $data))
            $this->setStartDate($data['start-date']);

        if (array_key_exists('end-date', $data))
            $this->setEndDate($data['end-date']);

        if (array_key_exists('use-tasks', $data))
            $this->setUseTasks($data['use-tasks']);

        if (array_key_exists('use-milestones', $data))
            $this->setUseMilestones($data['use-milestones']);

        if (array_key_exists('use-messages', $data))
            $this->setUseMessages($data['use-messages']);

        if (array_key_exists('use-files', $data))
            $this->setUseFiles($data['use-files']);

        if (array_key_exists('use-time', $data))
            $this->setUseTime($data['use-time']);

        if (array_key_exists('use-notebook', $data))
            $this->setUseNotebook($data['use-notebook']);

        if (array_key_exists('use-riskregister', $data))
            $this->setUseRiskRegister($data['use-riskregister']);

        if (array_key_exists('use-links', $data))
            $this->setUseLinks($data['use-links']);

        if (array_key_exists('use-billing', $data))
            $this->setUseBilling($data['use-billing']);

        if (array_key_exists('start-page', $data))
            $this->setStartPage($data['start-page']);

        if (array_key_exists('harvest-timers-enabled', $data))
            $this->setHarvestTimersEnabled($data['harvest-timers-enabled']);

        if (array_key_exists('defaultPrivacy', $data))
            $this->setDefaultPrivacy($data['defaultPrivacy']);

        return $this;
    }

}