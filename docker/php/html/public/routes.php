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

$app->group('/media', function() {
    $this->group('', function() {
        $this->post('', '\Qi\Controllers\MediaController:add')->add('jwt');
    });
    $this->group('/{id:[0-9]+}', function() {
        $this->get('', '\Qi\Controllers\MediaController:one');
        $this->group('', function() {
            $this->delete('', '\Qi\Controllers\MediaController:delete');
        })->add('jwt');
    });
});

$app->group('/me', function() {
    $this->patch('/password', '\Qi\Controllers\MeController:updatePassword');
})->add('jwt');

$app->group('/users', function() {
    $this->group('', function() {
        $this->get('', '\Qi\Controllers\UserController:all');
        $this->post('', '\Qi\Controllers\UserController:add');
    });
    $this->group('/{id:[0-9]+}', function() {
        $this->get('', '\Qi\Controllers\UserController:one');
        $this->delete('', '\Qi\Controllers\UserController:delete');
        $this->group('/password', function() {
            $this->patch('', '\Qi\Controllers\UserController:updatePassword');
        });
    });
})->add('admin-only')->add('jwt');

$app->post('/login', '\Qi\Controllers\LoginController:login');