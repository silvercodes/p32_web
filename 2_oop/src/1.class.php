<?php


// class User {
//     public $name;
//     public $email;

//     public function __construct()
//     {
        
//     }

//     public function test() {
//         return "hello $this->name";
//     }
// }

// $user = new User();
// $user->name = 'Vasia';
// echo $user->test();

// $a = $user;


// function render(User|null $user): void {
//     echo $user->test();
// }


// echo $user instanceof User;
// echo get_class($user);





// class Connection
// {
//     private $host;
//     private $connected = false;

//     public function __construct($host = 'localhost')
//     {
//         $this->host = $host;
//         $this->connect();
//     }

//     private function connect() {
//         echo "Connection to {$this->host}\n";
//     }

//     public function __destruct() {

//     }
// }




// =========== promoted properties (FROM 8.0) ==============


// class User {
//     public function __construct(
//         public string $name,
//         public string $email
//     ) {}
// }


// class User {
//     public function __construct(
//         public readonly string $id,
//         public string $email
//     ) {}
// }


// ============== property hooks (FROM 8.4) =================

// class User {
//     private string $_email;

//     public string $email {
//         get => $this->_email;
//         set {
//             $this->_email = $value;
//         }
//     }

//     public readonly string $info {
//         get => "User INFO";
//     }
// }



// ================= INHERITANCE =================

// class Unit
// {
//     protected string $title;

//     public function __construct(string $title)
//     {
//         $this->title = $title;
//     }

//     public function info(): string {
//         return 'INFO';
//     }
//     final public function getTitle(): string {
//         return $this->title;
//     }
// }

// class Archer extends Unit
// {
//     public function getLevel(): int {
//         return 3;
//     }
//     public function info(): string {
//         $baseInfo = parent::info();
//         return "$baseInfo Archer INFO";
//     }
// }

// $archer = new Archer('vasia');





// abstract class Shape {
//     protected $color;

//     public function __construct($color)
//     {
//         $this->color = $color;
//     }

//     abstract public function getArea(): float;

//     public function getColor() {
//         return $this->color;
//     }
// }

// class Rectangle extends Shape {
//     private $w;
//     private $h;

//     public function __construct($color, $w, $h)
//     {
//         parent::__construct($color);
//         $this->w = $w;
//         $this->h = $h;
//     }

//     public function getArea(): float {
//         return $this->w * $this->h;
//     }
// }

// $rect = new Rectangle('red', 3, 4);
// echo $rect->getArea();





//================ static ===============

// class User {
//     public static $prop;
//     public static function meth() {}
// }

// echo User::$prop;



// class Counter {
//     private static $count = 0;

//     public function __construct()
//     {
//         self::$count++;
//         echo "Created: " . self::$count . '\n';
//     }
//     public static function getCount() {
//         return self::$count;
//     }
// }




// self::(compile time)                 static::(runtime)              parent::(compile time)


// class ParentClass {
//     public static function who() {
//         echo __CLASS__;
//     }
//     public static function test() {
//         self::who();
//     }
// }

// class Child extends ParentClass {
//     public static function who() {
//         echo __CLASS__;
//     }
// }

// Child::test();





// class ParentClass {
//     public static function who() {
//         echo __CLASS__;
//     }
//     public static function test() {
//         static::who();
//     }
// }

// class Child extends ParentClass {
//     public static function who() {
//         echo __CLASS__;
//     }
// }

// Child::test();





// ============== Singleton ===============

// class Database {
//     private static $instances = [];

//     protected function __construct()
//     {}

//     public static function getInstace() {
//         $class = static::class;

//         if (!isset(self::$instances[$class]))
//             self::$instances[$class] = new static();

//         return self::$instances[$class];
//     }
// }

// class MySQLDatabase extends Database {}
// class PgDatabase extends Database {}

// $mysql = MySQLDatabase::getInstace();
// $pg = PgDatabase::getInstace();







// class Model {
//     public static function create($data) {
//         $instance = new static();
//         foreach($data as $key => $value)
//             $instance->$key = $value;

//         return $instance;
//     }
// }

// class User extends Model {}
// class Post extends Model {}

// $user = User::create(['email' => 'vasia@mail.com']);










