<?php

// #[Attribute]
// class Route
// {
//     public function __construct(
//         public string $path
//     ){}
// }

// class UserController {
//     #[Route('/users/{id}')]
//     public function show(int $id) {}
// }



// #[Attribute()]
// class Validate {
//     public function __construct(
//         public string $type,
//         public string|null $message = null,
//         public array $options = []
//     ) {}
// }

// class User {
//     #[Validate('email', message: 'Invalid email')]
//     private string $email;

//     #[Validate('length', options: ['min' => 8])]
//     private string $password;
// }





// =========================

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
class Route {
    public function __construct
    (
        public string $path,
        public array $methods = ['GET']
    ) {}
}

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
class Auth {
    public function __construct(
        public bool $required = true
    ) {}
}

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
class RateLimit {
    public function __construct(
        public int $maxRequests = 1000,
        public int $period = 60
    ) {}
}


#[
    Route('/api'),
    Auth(required: true),
    RateLimit(maxRequests: 500),
]
class UserController {

    #[Route('/users', methods: ['GET', 'POST'])]
    public function users() {}

    #[Route('/users/create', methods: ['POST'])]
    #[Auth(required: true),]
    public function create() {}
}

#[Route('/api')]
class PostController {

    #[Route('/posts', methods: ['GET'])]
    public function index() {}
}


$controllers = [UserController::class, PostController::class];

foreach ($controllers as $controller) {
    $reflection = new ReflectionClass($controller);

    $classRoute = $reflection->getAttributes(Route::class)[0] ?? null;
    $basePath = $classRoute ? $classRoute->newInstance()->path : '';

    foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
        if ($method->class === $reflection->getName()) {
            $routeAttr = $method->getAttributes(Route::class)[0] ?? null;

            if ($routeAttr) {
                $route = $routeAttr->newInstance();
                $methods = implode(',', $route->methods);
                $path = $basePath . $route->path;

                echo "$methods $path -> $controller::{$method->getName()}\n";
            }
        }
    }
}










