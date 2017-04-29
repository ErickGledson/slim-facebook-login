<?php

require 'vendor/autoload.php';

define('_ROOT', dirname(__FILE__));

$app = new \Slim\App([
    'settings' => [
        'debug' => true,
        'displayErrorDetails' => true
    ]
]);

require_once 'app/routes.php';

$app->run();
