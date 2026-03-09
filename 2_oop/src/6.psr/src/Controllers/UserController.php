<?php

namespace App\Controllers;

// require_once('./Models/User.php');

use App\Models\User;

class UserController
{
    public function createUser(): user {
        return new User('Vasia', 'vasia@mail.com');
    }
}
