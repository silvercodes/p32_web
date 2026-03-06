<?php

//============ match ======== FROM 8.0

// $status = 2;

// $message = match($status) {
//     1 => 'Pending',
//     2 => 'Rejected',
//     3 => 'Approved',
//     default => 'Unknown',
// };


// $message = match($status) {
//     1, 2 => 'Pending',
//     3, 4 => 'Rejected',
//     5, 6, 7 => 'Approved',
//     default => 'Unknown',
// };


// $age = 25;

// $category = match(true) {
//     $age < 18 => 'Child',
//     $age >=18 => 'Adult',
// }



// class User {
//     public function __construct(
//         public string $role
//     ) {}
// }

// $user = new User('admin');

// $permissions = match($user->role) {
//     'admin' => ['read', 'write', 'delete'],
//     'editor' => ['read', 'write'],
//     default => []
// };





// ======= enum ======= FROM 8.1

// enum Status {
//     case Pending;
//     case Approved;
//     case Rejected;
// }



// enum Status: string {
//     case Pending = 'pending';
//     case Approved = 'approved';
//     case Rejected = 'rejected';
// }

// echo Status::Approved->value;

// $status = Status::from('approved');
// $status2 = Status::tryFrom('invalid');

// echo $status->name;



enum Status: string {
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';

    public function color(): string {
        return match($this) {
            self::Pending => 'yellow',
            self::Approved => 'green',
            self::Rejected => 'red',
        };
    }

    public function label(): string {
        return match($this) {
            self::Pending => 'In progress',
            self::Approved => 'Completed',
            self::Rejected => 'Failed',
        };
    }
}

$status = Status::Approved;
echo $status->color();
echo $status->label();
