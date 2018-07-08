<?php
$container = $app->getContainer();

$container['page404'] = function ($container) {
    return function ($request, $response) use ($container) {
        $content = file_get_contents(__DIR__ . '/src/Templates/404.html');
        return $container['response']
            ->withStatus(404)
            ->withHeader('Content-Type', 'text/html')
            ->write($content);
    };
};

$container['jwt'] = function ($container) {
    $jwt = new \Qi\Middlewares\Jwt($container);
    return $jwt->get();
};

$container['auth'] = function ($container) {
    $auth = new \Qi\Services\AuthenService;
    return $auth;
};