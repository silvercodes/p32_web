<?php

// function funcName($a, $b = 45) {
//     return 45;
// }

// echo funcName(2, 3);



// function add(int $a, int $b): int
// {
//     return $a + $b;
// }

// echo add(2, 3);
// echo add('vasia', 3);




// function process(int|string $value): string {
//     if (is_int($value))
//         return "Int: $value";
//     else
//         return "String: $value";
// }




// $name = 'Vasia';

// function func() {
//     global $name;
//     echo $name;
// }

// func();



// function counter() {
//     static $count = 0;
//     $count++;
//     echo $count;
// }

// counter();
// counter();
// counter();



// $a = 10;
// $b = 20;

// function test() {
//     // global $a, $b;
//     $a = $GLOBALS['a'];
//     $b = $GLOBALS['b'];
//     echo $a + $b;
// }



// $factor = 2;

// $callback = function($x) use($factor) {
//     return $x * $factor;
// }

// $callback(4);



// $factor = 2;

// $callback = function($x) use(&$factor) {
//     return $x * $factor;
// }

// $callback(4);



// $func = function(int $a, int $b): int {
//     return $a + $b;
// }


// function process(array $items, callable $callback): array {
//     $result = [];

//     foreach ($items as $value) {
//         $result[] = $callback($value);
//     }

//     return $result;
// }

// $doubled = process([1, 2, 3], function(int $x) {
//     return $x * 2;
// });

// var_dump($doubled);




// $result = array_map(function($x) {
//     return $x ** 2;
// }, [1, 2, 3]);

// print_r($result);




// usort([4, 6, 1], function($a, $b) {return $a <=> $b});



// function create_multiplier($factor) {
//     return function($value) use ($factor) {
//         return $value * $factor;
//     };
// }

// $func = create_multiplier(5);
// echo $func(10);




//==================== Callable ==========

// 1. String

// function func(string $name): string {
//     return "Hello, $name";
// }

// $callback = 'func';
// echo $callback('Vasia');

// echo call_user_func('func', 'Petya');


// 2. Array

// class Executor 
// {
//     function func(string $name): string {
//         return "Hello, $name";
//     }

//     public static function add(int $a, int $b): int {
//         return $a + $b;
//     }
// }

// // $obj = new Executor();
// // $callback = [$obj, 'func'];

// // echo $callback('Vasia');

// // echo call_user_func([$obj, 'func'], 'Petya');


// $callback = ['Executor', 'add'];
// echo $callback(3, 4);



// 3. Closure
// $callback = function(string $name): string {
//     return "Hello $name";
// };

// echo call_user_func($callback, 'Petya');


// 4. Arrow functions

// $callback = fn(string $name): string => "Hello $name";


// 5. Obect with __invoke()

// class Executor
// {
//     public function __invoke(string $name): string {
//         return "Hello $name";
//     }
// }

// $obj = new Executor();
// echo $obj('Vasia');




// ==================================

// class EventDispatcher
// {
//     private array $listeners = [];

//     public function addListener(string $event, callable $listener): void {
//         $this->listeners[$event][] = $listener;
//     }

//     public function dispatch(string $event, mixed $data = null): void {
//         foreach($this->listeners[$event] ?? [] as $listener) {
//             $listener($data);
//         }
//     }
// }


// $disp = new EventDispatcher();

// $disp->addListener('user.created', 'sendWelcomeEmail');

// $disp->addListener('user.created', function($user) {
//     echo "Hello {$user['name']}";
// });

// $disp->addListener('user.created', new LogListener());

// $disp->addListener('user.created', fn($u) => log($u));

// $disp->dispatch('user.created', ['name' => 'Vasia']);




$a = 45;
$b = new User();


$f = function() use ($a, $b) {
    $b = new User();
};

$g = fn($val) => $b.set_age($a);

