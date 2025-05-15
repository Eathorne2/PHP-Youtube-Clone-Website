<?php

namespace Core;

/**
 * Router class
 */
class Router
{
	private $routes = [];

	public function get(string $path, string $handler):void
	{
		$this->routes['GET'][] = ['path'=>$path,'handler'=>$handler];
	}

	public function post(string $path, string $handler):void
	{
		$this->routes['POST'][] = ['path'=>$path,'handler'=>$handler];
	}

	public function run()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$pathURL = rtrim($_SERVER['REQUEST_URI'],'/') ?: '/';
		$pathURL = str_replace(dirname($_SERVER['SCRIPT_NAME']), '', $pathURL);
		$pathURL = empty($pathURL) ? '/': $pathURL;

		if(!isset($this->routes[$method])){

			http_response_code(405);
			echo "method not allowed";
			return;
		}

		foreach($this->routes[$method] as $route){

			$pattern = preg_replace("#\{[\w-]+\}#", '([\w-]+)', $route['path']);
			$pattern = '#^'.$pattern.'$#';

			if(preg_match($pattern, $pathURL, $varMatches))
			{
				array_shift($varMatches);
				preg_match_all("#\{([\w-]+)\}#",$route['path'],$keyMatches);
				$file = '../app/controllers/'.$route['handler'];
				if(file_exists($file)){

					$params = array_combine($keyMatches[1], $varMatches);
					require $file;
				}else{
					redirect('404');
				}
				return;
			}
		}

		http_response_code(404);
		redirect('404');
	}
}