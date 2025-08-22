<?php

namespace Core;

/**
 * Router class
 */
class Router
{
	private $routes = [];
	public $URL = [];
	private $pathPrefix = '';
	private $currentMiddleware = [];

	public function group(string $prefix, $callback, $middleware = []):void
	{

		$this->pathPrefix = $prefix;
		$this->currentMiddleware = $middleware;
		$callback($this);
		$this->pathPrefix = '';
		$this->currentMiddleware = [];
	}

	public function get(string $path, string $handler, $middleware = []):void
	{
		$path = $this->pathPrefix . $path;
		$middleware = array_merge($this->currentMiddleware,$middleware);
		$this->routes['GET'][] = ['path'=>$path,'handler'=>$handler,'middleware'=>$middleware];
	}

	public function post(string $path, string $handler, $middleware = []):void
	{
		$path = $this->pathPrefix . $path;
		$middleware = array_merge($this->currentMiddleware,$middleware);
		$this->routes['POST'][] = ['path'=>$path,'handler'=>$handler,'middleware'=>$middleware];
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
					$this->URL = $this->splitURL($pathURL);

					/*run some middleware*/
					if(!empty($route['middleware']))
					{
						foreach ($route['middleware'] as $mw) {
							$mw = ucfirst($mw);
							$myclass = new ("\\Middleware\\$mw")();
							$myclass->index();
						}
					}

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

	private function splitURL(string $url):array 
	{
		return explode("/", trim($url,'/'));
	}
}