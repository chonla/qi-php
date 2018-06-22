<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/posts', function () {
    $this->get('', '\Qi\Controllers\PostController:all');
    $this->get('/{id:[0-9]+}', '\Qi\Controllers\PostController:one');
    $this->post('', '\Qi\Controllers\PostController:add');
    $this->put('/{id:[0-9]+}', '\Qi\Controllers\PostController:update');
});