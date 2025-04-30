<?php

spl_autoload_register(function($className){

	$file = '../app/classes/'. str_replace('\\', '/', $className).'.php';
	if(file_exists($file))
		require $file;
	else
		echo 'Class file not found: '.$file;
});

require 'config.php';
require 'functions.php';
require 'routes.php';