<?php

namespace Auth;

use \Core\Database;

/**
 * Country model
 */
class Country extends Database
{
	
	public function getAll()
	{
		return $this->fetchAll("select * from countries");
	}
}