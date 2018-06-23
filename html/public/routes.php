<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/posts', function () {
    $this->group('', function() {
        $this->get('', '\Qi\Controllers\PostController:all');
        $this->post('', '\Qi\Controllers\PostController:add');
    });
    $this->group('/{id:[0-9]+}', function () {
        $this->get('', '\Qi\Controllers\PostController:one');
        $this->put('', '\Qi\Controllers\PostController:replace');
        $this->patch('', '\Qi\Controllers\PostController:update');
        $this->delete('', '\Qi\Controllers\PostController:delete');
    });
});