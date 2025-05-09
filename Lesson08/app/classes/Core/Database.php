<?php

namespace Core;

use \PDO;

/**
 * Database class
 */
class Database
{
	private $con = null;

	function __construct()
	{
		$str = DB_DRIVER.':'.DB_HOST.';'.DB_NAME;

		try{
			$con = new PDO($str, DB_USER, DB_PASS);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$this->con = $con;

		}catch(Exception $e){
			die("Could not connect to the Database");
		}
	}
}