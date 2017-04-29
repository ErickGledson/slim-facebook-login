<?php

namespace App\Route;
new \App\Database\Capsule;

$app->get('/login', 'App\Controller\HomeController:login');
$app->any('/endpoint', 'App\Controller\HomeController:endpoint');
$app->any('/logout', 'App\Controller\HomeController:logout')
?>
