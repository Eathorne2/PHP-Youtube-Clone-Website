<?php

namespace Middleware;
use \Core\Database;

/**
 * Admin Middleware class
 */
class Admin extends Database
{
	
	public function index()
	{
		dd('Checking if user is admin');

	}
}