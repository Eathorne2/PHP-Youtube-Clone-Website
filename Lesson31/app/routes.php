<?php

use \Core\Router as Router;

$router = new Router;

$router->get('/','frontend/home.php');
$router->get('/404','404.php');

$router->get('/login','auth/login.php');
$router->get('/signup','auth/signup.php');

$router->group('/admin',function($r){

	$r->get('','admin/admin.php');
	$r->get('/upload-video','admin/upload-video.php');
	$r->get('/my-channels','admin/my-channels.php');
	$r->get('/my-videos','admin/my-videos.php');
	$r->get('/settings','admin/settings.php');
	$r->get('/profile','admin/profile.php');
	$r->get('/analytics','admin/analytics.php');
},['admin']);

$router->post('/login','auth/login.php');
$router->post('/signup','auth/signup.php');

$router->group('/profile',function($r){

	$r->get('/{id}','profile.php');
	$r->get('/edit/{id}','profile.php');
	$r->get('/delete/{id}/{cat}','profile.php');
},['auth']);


$router->run();
