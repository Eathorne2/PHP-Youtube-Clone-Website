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
			CREATE TABLE users (
				id int unsigned NOT NULL AUTO_INCREMENT,
				first_name varchar(30) DEFAULT NULL,
				last_name varchar(30) DEFAULT NULL,
				email varchar(100) DEFAULT NULL,
				email_verify varchar(100) DEFAULT NULL,

				image varchar(512) null,
				gender varchar(6) null,
				password varchar(255) null,
				dob date null,
				channel_id int unsigned default 0,
				deleted tinyint(1) unsigned DEFAULT 0,
				country_id int unsigned default 0,

				date_created datetime DEFAULT NULL,
				date_updated datetime DEFAULT NULL,
				date_deleted datetime DEFAULT NULL,

			 PRIMARY KEY (id),
			 KEY (email)
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