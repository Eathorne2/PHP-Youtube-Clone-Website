<?php

namespace Migration;

/**
 * Creates the users table
 */
class Users extends Migration
{
	
	public function up()
	{
		$sql = "
			CREATE TABLE `users` (
			 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
			 `name` varchar(30) DEFAULT NULL,
			 `email` varchar(100) DEFAULT NULL,
			 `timestamp` int(10) unsigned DEFAULT NULL,
			 `date_created` date DEFAULT NULL,
			 PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

			";

		$res = $this->query($sql);
		echo ("\nTable users created successfully!\n");
		return $res;

	}

	public function down()
	{
		$sql = "drop table if exists users";
		$res = $this->query($sql);

		echo("\nTable users dropped successfully!\n");
		return $res;

	}

	
}