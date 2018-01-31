<?php

namespace App\Tickets;

use App\Models\DeliveryMethod;

abstract class Ticket {

    protected $name = null;
    protected $email = null;
    protected $subject = null;
    protected $message = null;
    protected $postscript = null;
    protected $attachments = [];
    protected $delivery_method;

    public function __construct(array $data, DeliveryMethod $method) {
        $this->delivery_method = $method;
        $this->populate($data);
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getPostscript() {
        return $this->postscript;
    }

    public function getAttachments() {
        return $this->attachments;
    }

    public function getExtendedMessage() {

        $extended_message = $this->getMessage();

        if ($this->getPostscript())
            $extended_message .= PHP_EOL . PHP_EOL . $this->getPostscript();

        if (count($this->getAttachments())) {
            $extended_message .= PHP_EOL . PHP_EOL . 'Files:';
            foreach ($this->getAttachments() as $attachment) {
                $extended_message .= PHP_EOL . $attachment['url'];
            }
        }

        return $extended_message;

    }

    private function populate(array $data) {

        $this->name = isset($data['name']) ? $data['name'] : $this->name;
        $this->email = isset($data['email']) ? $data['email'] : $this->email;
        $this->subject = isset($data['subject']) ? $data['subject'] : $this->subject;
        $this->message = isset($data['message']) ? $data['message'] : $this->message;
        $this->postscript = isset($data['postscript']) ? $data['postscript'] : $this->postscript;
        $this->attachments = isset($data['attachments']) ? $data['attachments'] : $this->attachments;
        $this->delivery_method = isset($data['delivery_method']) ? $data['delivery_method'] : $this->delivery_method;

    }

}