<?php

spl_autoload_register(function($className){

	$file = '../app/classes/'.$className;
	echo $file;
});

require 'config.php';
require 'functions.php';
require 'routes.php';