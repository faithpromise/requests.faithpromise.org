<?php

namespace App\Services\Teamwork\Models;

abstract class AbstractModel {

    public function __construct($data = null) {
        if ($data)
            $this->fill($data);
    }

}