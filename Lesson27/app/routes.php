<?php

use \Core\Router as Router;

$router = new Router;

$router->get('/','home.php');
$router->get('/404','404.php');

$router->get('/login','auth/login.php');
$router->get('/signup','auth/signup.php');

$router->get('/admin','admin/admin.php');
$router->get('/admin/upload-video','admin/upload-video.php');
$router->get('/admin/my-channels','admin/my-channels.php');
$router->get('/admin/my-videos','admin/my-videos.php');
$router->get('/admin/settings','admin/settings.php');
$router->get('/admin/profile','admin/profile.php');
$router->get('/admin/analytics','admin/analytics.php');

$router->post('/login','auth/login.php');
$router->post('/signup','auth/signup.php');

$router->get('/profile/{id}','profile.php');
$router->get('/profile/edit/{id}','profile.php');
$router->get('/profile/delete/{id}/{cat}','profile.php');


$router->run();
