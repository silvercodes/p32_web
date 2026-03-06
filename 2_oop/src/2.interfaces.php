<?php

interface ILoggable {
    public function log();
}

interface ISavable {
    public function save();
}

// class Logger implements ILoggable {
//     public function log() {
//         echo "log";
//     }
// }

// class Store implements ISavable {
//     // protected function save()            // ERROR
//     // {}
//     // public function save($data) {        // ERROR

//     // }
// }


// class Store implements ILoggable, ISavable
// {
//      public function log() {}
//      public function save() {}
// }


// interface IFileSavable extends ISavable
// {
//     public function store();
// }

// class Manager implements IFileSavable
// {
//     public function save() {}
//     public function store() {}
// }



// interface IStatus
// {
//     public const PENDING = 'pending';
//     public const APROVED = 'aproved';
//     public const REJECTED = 'rejected';
// }

// class Order implements IStatus
// {
//     public function getStatud() {
//         return self::APROVED;
//     }
// }



// class User {}

// interface IFactory
// {
//     public static function create($data);
// }

// class UserFactory implements IFactory
// {
//     public static function create($data) {
//         return new User($data);
//     }
// }


// class Model{}

// interface IRepository {
//     public function find(int $id): Model|null;
//     public function findAll(): array;
//     public function save(Model $model): void;
// }




// interface LoggerInterface {
//     public function log(string $message): void;
// }

// abstract class AbstractLogger implements LoggerInterface {
//     protected $logFile;

//     public function __construct(string $logFile)
//     {
//         $this->logFile = $logFile;
//     }

//     protected function writeToFile(string $message): void {
//         file_put_contents($this->logFile, $message, FILE_APPEND);
//     }

//     abstract public function log(string $message): void;
// }

// class FileLogger extends AbstractLogger {
//     public function log(string $message): void {
//         $formatted = '[' . date('Y-m-d H:i:s') . "] $message";
//         $this->writeToFile($formatted);
//     }
// }

// class DbLogger extends AbstractLogger {
//     public function log(string $message): void {
//        echo "DB log: $message\n";
//     }
// }

// $logger = new FileLogger('/tmp/app.log');
// $logger->log('Test message');




// ===================== traits =====================

// trait Loggable {
//     protected $logFile = '/tmp/app.log';

//     public function log(string $message): void {
//         $formatted = '[' . date('Y-m-d H:i:s') . "] $message";
//         file_put_contents($this->logFile, $formatted, FILE_APPEND);
//     }
// }

// trait Timestamps {
//     protected $createdAt;
//     protected $updatedAt;

//     public function touch() {
//         $this->updatedAt = time();
//     }
// }

// class User {
//     use Loggable;

//     public function create() {
//         $this->log('User created');
//     }
// }

// class Post {
//     use Loggable, Timestamps;

//     public function publish() {
//         $this->log('User created');
//         $this->touch();
//     }
// }




// TODO: Это пока обсуждается :)
// interface ILogger {
//     public function log($message): void;
// }

// trait Loggable implements ILogger {
//     public function log($message): void {

//     }
// }






// trait Loggable {
//     abstract protected function getLogContext(): string;

//     public function log(string $message): void {
//         $ctx = $this->getLogContext();
//         //
//         //
//     }
// }

// class User {
//     use Loggable;

//     protected function getLogContext(): string
//     {
//         return 'User';
//     }
// }




// trait Hello {
//     public function greet() {
//         return 'Hello';
//     }
// }

// trait Hi {
//     public function greet() {
//         return 'Hi';
//     }
// }

// class user {
//     use Hello, Hi {
//         Hello::greet insteadof Hi;
//         Hi::greet as hiGreet;
//     }
// }

// $u = new User();
// echo $u->greet();
// echo $u->hiGreet();





// trait A {
//     public function test() { return 'A'; }
// }
// trait B {
//     public function test() { return 'B'; }
// }
// trait C {
//     public function test() { return 'C'; }
// }

// class D {
//     use A, B, C {
//         A::test insteadof B, C;
//         B::test as bTest;
//         C::test as cTest;
//     }
// }

// $d = new D();
// $d->test();
// $d->bTest();
// $d->cTest();








// ===========================

// interface RepositoryInterface {
//     public function find($id): object|null;
//     public function findAll(): array;
//     public function save(object $entity): void;
//     public function delete($id): void;
// }

// trait BaseRepository {
//     protected array $storage = [];
//     protected int $nextId = 1;

//     public function find($id): object|null {
//         return $this->storage[$id];
//     }
//     public function findAll(): array {
//         return array_values($this->storage);
//     }
    
//     public function delete($id): void {
//         if (isset($this->storage[$id])) {
//             unset($this->storage[$id]);
//         }
//     }

//     protected function getNextId(): int {
//         return $this->nextId++;
//     }
// }


// class User {
//     public int $id;
//     public string $name;
//     public string $email;
//     public function __construct(string $name, string $email)
//     {
//         $this->name = $name;
//         $this->email = $email;
//     }
// }

// class UserRepository implements RepositoryInterface {
//     use BaseRepository;

//     public function save(object $entity): void {
//         if (!isset($entity->id)) {
//             $entity->id = $this->getNextId();
//         }

//         $this->storage[$entity->id] = $entity;
//     }

//     public function findByName(string $name): array|null {
//         return array_filter($this->storage, fn($u) => $u->name == $name);
//     }
// }

// $userRepo = new UserRepository();
// $userRepo->save(new User('vasia', 'vasia@mail.com'));
// $userRepo->save(new User('petya', 'petya@mail.com'));

// foreach($userRepo->findAll() as $user)
//     echo "- {$user->name}\n";





