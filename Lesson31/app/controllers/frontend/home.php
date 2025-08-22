<?php

use \Auth\Session;
use \Auth\User;

$ses = new Session;
$user = new User;

$data['user'] = false;
if($ses->isLoggedIn())
	$data['user'] = $user->getById($ses->user('id'));

$data['title'] = 'Home - Youtube Clone';
$data['URL'] = $this->URL;

$template = new \Core\Template;
$template->render('frontend.home',$data);