<?php

use \Auth\Session;
use \Auth\User;

$ses = new Session;
$user = new User;

if(!$ses->isLoggedIn())
	redirect('login');

$data['title'] = 'Admin';
$data['user'] = $user->getById($ses->user('id'));

$template = new \Core\Template;
$template->render('admin.main',$data);