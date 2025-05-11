<?php
namespace Migration;

use \Core\Database;

/**
 * Migration class
 */
class Migration extends Database
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function run()
	{
		$file = '../app/migrations/Users.php';
		require $file;
		$user = new \Migration\Users;
		$user->up();
	}
}