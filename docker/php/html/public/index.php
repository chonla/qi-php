<?php
require '../vendor/autoload.php';

$settings = require('./settings.php');

$app = new \Slim\App($settings);

require './dependencies.php';
require './middlewares.php';
require './routes.php';
require './bootstrap.php';

$app->run();