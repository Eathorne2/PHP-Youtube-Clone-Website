<?php

namespace Migration;

/**
 * Creates the channels table
 */
class Channels extends Migration
{
	
	public function up()
	{
		$sql = "
			CREATE TABLE channels (
				id int unsigned NOT NULL AUTO_INCREMENT,
				user_id int unsigned default 0,
				name varchar(100),
				description varchar(1024) null,
				tags varchar(1024) null,
				image varchar(255) null,
				cover varchar(255) null,

				deleted tinyint(1) default 0,
				country_id tinyint(3) unsigned DEFAULT 0,
				handle varchar(100) null,
				slug varchar(100) null,

				date_created datetime DEFAULT NULL,
				date_updated datetime DEFAULT NULL,
				date_deleted datetime DEFAULT NULL,

			 PRIMARY KEY (id),
			 KEY (user_id),
			 KEY (name),
			 KEY (deleted),
			 KEY (handle),
			 KEY (slug)
			) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

			";

		$res = $this->query($sql);
		echo ("\nTable channels created successfully!\n");
		return $res;

	}

	public function down()
	{
		$sql = "drop table if exists channels";
		$res = $this->query($sql);

		echo("\nTable channels dropped successfully!\n");
		return $res;

	}

	
}