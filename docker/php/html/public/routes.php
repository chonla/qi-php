<?php

$app->get('/summary', '\Qi\Controllers\SummaryController:all'); //->add('jwt');

$app->group('/posts', function () {
    $this->group('', function() {
        $this->get('', '\Qi\Controllers\PostController:all');
        $this->post('', '\Qi\Controllers\PostController:add')->add('jwt');
    });
    $this->post('/draft', '\Qi\Controllers\PostController:addAsDraft')->add('jwt');
    $this->group('/{id:[0-9]+}', function () {
        $this->get('', '\Qi\Controllers\PostController:one');
        $this->group('', function() {
            $this->delete('', '\Qi\Controllers\PostController:delete');
            $this->patch('/publish', '\Qi\Controllers\PostController:saveAndPublish');
            $this->patch('/draft', '\Qi\Controllers\PostController:saveAsDraft');
        })->add('jwt');
    });
});

$app->group('/media', function() {
    $this->group('', function() {
        $this->post('', '\Qi\Controllers\MediaController:add')->add('jwt');
        $this->post('/photo', '\Qi\Controllers\MediaController:upload');
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