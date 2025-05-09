<?php

function redirect(string $path):void 
{
	echo "Page not found";
	//header("Location: /$path")
}

function dd(mixed $data, bool $stop = false):void 
{
	echo '<pre>';
	print_r($data);
	echo '</pre>';
	if($stop)
		die();
}
