<?php

$app->group('/posts', function () {
    $this->group('', function() {
        $this->get('', '\Qi\Controllers\PostController:all');
        $this->post('', '\Qi\Controllers\PostController:add')->add('jwt');
    });
    $this->group('/{id:[0-9]+}', function () {
        $this->get('', '\Qi\Controllers\PostController:one');
        $this->group('', function() {
            $this->put('', '\Qi\Controllers\PostController:replace');
            $this->patch('', '\Qi\Controllers\PostController:update');
            $this->delete('', '\Qi\Controllers\PostController:delete');
        })->add('jwt');
    });
});

$app->group('/users', function() {
    $this->group('', function() {
        $this->get('', '\Qi\Controllers\UserController:all');
    });
})->add('jwt');

$app->post('/login', '\Qi\Controllers\LoginController:login');