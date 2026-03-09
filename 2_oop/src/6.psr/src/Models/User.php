<?php

namespace App\Models;

class User
{
    public function __construct(
        public string $name,
        public string $email
    )
    {}

    public function getName(): string {
        return $this->name;
    }
}