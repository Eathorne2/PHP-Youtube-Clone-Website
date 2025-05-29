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

function view(string $path, array $data = []):void 
{
	if(!empty($data))
		extract($data);
	
	$file = "../app/views/".$path.".view.php";
	if(file_exists($file))
		require $file;
	else
		echo "View file not found: $file";
}

function esc(string $str):string 
{
	return htmlspecialchars($str);
}

function showError(array $errors, string $key, string $mode = 'one'):string
{
	if(!empty($errors[$key])){

		if($mode == 'all')
			return '<div class="text-danger"><small><i>'.(implode('<br>', $errors[$key])).'</i></small></div>';
		else
			return '<div class="text-danger"><small><i>'.esc($errors[$key][0]).'</i></small></div>';
	}

	return '';
}

function oldValue(string $key, string $default = '',string $method = 'post'):?string
{
	$data = ($method == 'post') ? $_POST:$_GET;
	if(!empty($data[$key]))
		return $data[$key];

	return $default;
}

function oldChecked(string $key, string $value, string $default = '',string $method = 'post'):?string
{
	$data = ($method == 'post') ? $_POST:$_GET;
	if(!empty($data[$key])){

		if($data[$key] == $value)
		return ' checked ';
	}

	return '';
}

function oldSelect(string $key, string $value, string $default = '',string $method = 'post'):?string
{
	$data = ($method == 'post') ? $_POST:$_GET;
	if(!empty($data[$key])){

		if($data[$key] == $value)
		return ' selected ';
	}

	return '';
}

function flashMessage(string $msg = '',string $mode = 'success',bool $delete = false):string|bool
{
	$ses = new \Auth\Session;

	if(!empty($msg))
	{
		$ses->set('flash',$msg);
		return true;
	}else{

		return '<div class="alert text-center alert-'.$mode.'">'.$ses->set('flash').'</div>';
	}

	return '';
}
