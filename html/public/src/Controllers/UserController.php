<?php
namespace Qi\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container;
use \Qi\Models\User as User;

class UserController {
    private $c;

    function __construct(\Slim\Container $c) {
        $this->c = $c;
    }

}