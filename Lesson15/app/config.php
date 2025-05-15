<?php

if(PHP_SAPI !== 'cli')
	define('BASE_URL', getBaseURL());

/**database vars**/
define('DB_DRIVER', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'youtube_clone_db');
define('DB_USER', 'root');
define('DB_PASS', '');

