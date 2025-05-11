<?php

namespace Migration;

/**
 * Users table class
 */
class Users extends Migration
{
	
	public function up()
	{
		echo 'here';
		$sql = "
			select * from users
		";

		dd($this->query($sql)->fetchAll());

	}

	public function down()
	{
		$sql = "drop table if exists users";
	}

	
}