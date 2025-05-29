<?php

use \Core\Router as Router;

$router = new Router;

$router->get('/','home.php');
$router->get('/404','404.php');

$router->get('/login','auth/login.php');
$router->get('/signup','auth/signup.php');

$router->get('/admin','admin/admin.php');

$router->post('/login','auth/login.php');
$router->post('/signup','auth/signup.php');

$router->get('/profile/{id}','profile.php');
$router->get('/profile/edit/{id}','profile.php');
$router->get('/profile/delete/{id}/{cat}','profile.php');


$router->run();
