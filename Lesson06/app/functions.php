<?php

spl_autoload_register(function($className){

	$file = '../app/classes/'. str_replace('\\', '/', $className).'.php';
	if(file_exists($file))
		require $file;
	else
		echo 'Class file not found: '.$file;
});

function redirect(string $path):void 
{
	header("Location: ".BASE_URL."/$path");
	die();
}

function dd(mixed $data, bool $stop = false):void 
{
	echo '<pre>';
	print_r($data);
	echo '</pre>';
	if($stop)
		die();
}
