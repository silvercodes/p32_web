<?php

// require_once('./Controllers/UserController.php');

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\UserController;

$uc = new UserController();

$user = $uc->createUser();

var_dump($user);


