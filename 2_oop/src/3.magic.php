<?php

// ======== __get __set =========

// class User {
//     private array $data = [];

//     public function __get(string $name): mixed {
//         echo "Get $name\n";
//         return $this->data[$name] ?? null;
//     }

//     public function __set(string $name, mixed $value): void {
//         echo "Set $name = $value";
//         $this->data[$name] = $value;
//     }
// }

// $user = new User();
// $user->email = 'vasia@mail.com';
// echo $user->email;




// class Product {
//     private float $price;

//     public function __get(string $name): mixed {
//         return match($name) {
//             'priceWithVal' => $this->price * 1.2,
//             'priceWithoutVal' => $this->price * 0.8,
//             default => null,
//         };
//     }

//     public function __set(string $name, mixed $value): void {
//         if ($name == 'price') {
//             $this->price = $value;
//         }
//     }
// }


// $p = new Product();
// $p->price = 100;
// echo $p->priceWithoutVal;




// ======== __call =========

// TODO: ???????????
class Router {
    public function __call(string $name, array $args) {
        echo "Calling method: $name\n";
        $argsAsStrings = array_map(function($arg) {
            return is_array($arg) ? json_encode($arg) : (string)$arg;
        }, $args);
        echo "Args: " . implode(', ', $argsAsStrings) . "\n";
    }
    }

$router = new Router();
$router->get('/users');
$router->post('/users', [1, 2, 3]);





