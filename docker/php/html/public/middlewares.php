<?php
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->add(new \Qi\Middlewares\TrailSlash);
$app->add(new \Qi\Middlewares\Cors);
