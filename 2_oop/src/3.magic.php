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




// ======== __call __callstatic =========

// class Router {
//     public function __call(string $name, array $args) {
//         echo "Calling method: $name\n";
//         $argsAsStrings = array_map(function($arg) {
//             return is_array($arg) ? json_encode($arg) : (string)$arg;
//         }, $args);
//         echo "Args: " . implode(', ', $argsAsStrings) . "\n";
//     }
//     }

// $router = new Router();
// $router->get('/users');
// $router->post('/users', [1, 2, 3]);



// class User {
//     private array $attributes = [];

//     public static function __callStatic(string $name, array $arg)
//     {
//         if (! str_starts_with($name, 'create'))
//             throw new Exception("Method $name does not allowed");

//         $user = new self();
//         $user->attributes['name'] = $args[0] ?? null;
//         return $user;

//     }
// }

// $user = User::create(['Vasia']);




// ========== __isset __unset =========

// class User
// {
//     private array $data = [];

//     public function __isset(string $name): bool
//     {
//         echo "Checking if $name is set";
//         return isset($this->data[$name]);
//     }

//     public function __set(string $name, mixed $value): void
//     {
//         $this->data[$name] = $value;
//     }

//     public function __unset(string $name): void
//     {
//         echo "Unset $name";
//         unset($this->data[$name]);
//     }
// }

// $user = new User();
// $user->name = 'Vasia';

// var_dump(isset($user->name));
// var_dump(isset($user->name));

// unset($user->name);
// var_dump(isset($user->name));





// ======= __toString  __invoke() ========

// interface Strategy {
//     public function __invoke(array $data): array;
// }

// class UppercaseStrategy implements Strategy {
//     public function __invoke(array $data): array {
//         return array_map('strtoupper', $data);
//     }
// }

// class LowercaseStrategy implements Strategy {
//     public function __invoke(array $data): array {
//         return array_map('strtolower', $data);
//     }
// }

// class Processor {
//     public function process(array $data, Strategy $strategy) {
//         return $strategy($data);
//     }
// }

// $p = new Processor();
// var_dump($p->process(['a', 'b', 'c'], new UppercaseStrategy()));



// =============== QueryBuilder =============

class QueryBuilder {
    private array $select = ['*'];
    private string $from = '';
    private array $wheres = [];
    private array $orderBy = [];
    private int|null $limit = null;

    public function select(array $fields): self {
        $this->select = $fields;
        return $this;
    }

    public function from(string $table): self {
        $this->from = $table;
        return $this;
    }

    public function __call(string $name, array $args) {
        if (str_starts_with($name, 'where')) {
            $field = lcfirst(substr($name, 5));
            $this->wheres[] = [
                'field' => $field,
                'value' => $args[0] ?? null,
            ];

            return $this;
        }

        if ($name === 'orderBy') {
            $this->orderBy[] = $args[0];
            return $this;
        }

        if ($name === 'limit') {
            $this->limit = $args[0];
            return $this;
        }

        throw new Exception("Method $name does not exist");
    }

    public function getQuery(): string {
        $select = implode(', ', $this->select);
        $from = $this->from;

        $whereString = '';
        if (! empty($this->wheres)) {
            $conditions = array_map(
                fn($w) => "{$w['field']} = '{$w['value']}'",
                $this->wheres
            );

            $whereString = ' WHERE ' . implode(' AND ', $conditions);
        }

        $orderString = '';
        if (! empty($this->orderBy)) {
            $orderByString = ' ORDER BY ' . implode(', ', $this->orderBy);
        }

        $limitString = '';
        if ($this->limit !== null) {
            $limitString = " LIMIT {$this->limit}";
        }

        return "SELECT $select FROM $from" . $whereString . $orderByString . $limitString;
    }

}

$query = new QueryBuilder();
$query->select(['id', 'name'])
    ->from('users')
    ->whereName('Vasia')
    ->whereAge(25)
    ->orderBy('created_at')
    ->limit(10);

echo $query->getQuery();






