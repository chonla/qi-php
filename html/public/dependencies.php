<?php
$container = $app->getContainer();

// // Service factory for the ORM
// $container['db'] = function ($container) {
//     $capsule = new \Illuminate\Database\Capsule\Manager;
//     $capsule->addConnection($container['settings']['db']);

//     $capsule->setAsGlobal();
//     $capsule->bootEloquent();

//     return $capsule;
// };

$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
        $content = file_get_contents(__DIR__ . '/src/Templates/404.html');
        return $container['response']
            ->withStatus(404)
            ->withHeader('Content-Type', 'text/html')
            ->write($content);
    };
};