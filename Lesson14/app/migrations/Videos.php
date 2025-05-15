<?php

namespace Migration;

/**
 * Creates the videos table
 */
class Videos extends Migration
{
	
	public function up()
	{
		$sql = "
			CREATE TABLE `videos` (
			 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
			 `name` varchar(30) DEFAULT NULL,
			 `email` varchar(100) DEFAULT NULL,
			 `timestamp` int(10) unsigned DEFAULT NULL,
			 `date_created` date DEFAULT NULL,
			 PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

			";

		$res = $this->query($sql);
		echo ("\nTable videos created successfully!\n");
		return $res;

	}

	public function down()
	{
		$sql = "drop table if exists videos";
		$res = $this->query($sql);

		echo("\nTable videos dropped successfully!\n");
		return $res;

	}

	
}