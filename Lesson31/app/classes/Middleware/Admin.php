<?php

namespace Middleware;
use \Core\Database;
use \Auth\Session;
use \Auth\User;

/**
 * Admin Middleware class
 */
class Admin extends Database
{
	
	public function index()
	{
		$ses = new Session;
		$user = new User;

		if(!$ses->isLoggedIn())
			redirect('login');

	}
}