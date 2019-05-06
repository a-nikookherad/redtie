<?php

namespace Core;

//use mysql_xdevapi\Exception;
class Router
{
	private $route = [];
	private $routeRegex;
	protected $uri;
	protected $queryString;
	public $nameSpace;
	private $middleWare;
	private $controller;
	private $method;
	private $parameters = [];
	/*------file property---------*/
	public static $is404 = true;
	private $path = [];
	private $pathUrl;

	public function __construct($uri)
	{
		$explodeUri = explode('?' , $uri , 2);
		$uri = $explodeUri[0];
		$this->queryString = isset($explodeUri[1]) ? $explodeUri[1] : null;
		$uri = ltrim($uri , '/');
		$this->uri = $uri = rtrim($uri , '/');
		$this->path = explode('/' , $uri);
		$this->pathUrl = rtrim(ltrim($explodeUri[0] , '/') , '/');
	}

	public function setRoute($route , $action)
	{
		//get route regular expression
		$trimRoute = ltrim($route , '/');
		$trimRoute = rtrim($trimRoute , '/');
		$convertRoute = preg_replace('/\//' , '\\/' , $trimRoute);
		$this->routeRegex = preg_replace('/\{([a-z_]+)\}/' , '(?<\1>[a-z0-9-_]+)' , $convertRoute);
		$this->routeRegex = "/^" . $this->routeRegex . "$/i";
		// process action parameter and set controller & method & name space & middle ware property
		if (is_array($action)) {
			//run if action is array
			list($this->controller , $this->method) = explode('@' , $action['uses']);
			$this->middleWare = $action['middleWare'];
			$this->nameSpace = $action['nameSpace'];
		} else {
			list($this->controller , $this->method) = explode('@' , $action);
		}
		// put all data to route array
		$data = [
			"controller" => $this->controller ,
			"method" => $this->method ,
			"nameSpace" => $this->nameSpace ,
			"middleWare" => $this->middleWare ,
		];
		$this->dismatch();
		if (!isset($this->middleWare) && empty($this->middleWare)) {
			unset($data["middleWare"]);
		}
		if (!isset($this->nameSpace) && empty($this->nameSpace)) {
			unset($data["nameSpace"]);
		}
		if (isset($this->parameters)) {
			$data["parameters"] = $this->parameters;
		}
		$this->route[$this->routeRegex] = $data;
	}

	/*define class and method and parameters and call them if uri match with route and exist controller & method */
	public function dismatch()
	{
		if ($this->match()) {
			/*-------------------check file exists---------------------*/
			$pathUrl = $this->pathUrl;
			$moduleName = $this->path[0];
			$pos = substr($pathUrl , 0 , strpos($pathUrl , '/'));
			$pathUrl = str_replace($pos , '' , $pathUrl);
			if (file_exists(__DIR__ . '/../App/Http/Modules/' . $moduleName . '/mod-cp' . $pathUrl . '.php')) {
				$file = __DIR__ . '/../App/Http/Modules/' . $moduleName . '/mod-cp' . $pathUrl . '.php';
				Views::viewRender($file , []);
				self::$is404 = false;
				return;
			}
			/*------------check class and methods(controllers)--------------*/
			$controller = $this->name_Space();
			if (class_exists($controller)) {
				self::$is404 = false;
				$instanceOfController = new $controller;
				if (isset($this->method) && method_exists($instanceOfController , $this->method) && is_callable([$instanceOfController , $this->method])) {
					$method = $this->method;
					call_user_func_array([$instanceOfController , $method] , isset($this->parameters) ? $this->parameters : null);
				} else {
					throw new \Exception("method {$this->method} is not exist");
				}
			} else {
				throw new \Exception("class {$controller} is not exist");
			}
		}
	}

	/*check for match of uri and route And get parameters of route*/
	public function match()
	{
		$pathUrl = $this->pathUrl;
		$pos = substr($pathUrl , 0 , strpos($pathUrl , '/'));
		$pathUrl = str_replace($pos , '' , $pathUrl);
		if (preg_match($this->routeRegex , $this->uri , $matches)) {
			//get param with uri and set them to parameters property
			foreach ($matches as $key => $match) {
				if (is_string($key)) {
					$this->parameters[$key] = $match;
				}
			}
			return true;
			/*------------check file exists*/
		} elseif (!empty($this->path[0]) && file_exists(__DIR__ . '/../App/Http/Modules/' . $this->path[0] . '/mod-cp' . $pathUrl . '.php')) {
			return true;
		} else {
			return false;
		}
	}


	/*create name space for controller file*/
	public function name_Space()
	{
		if (isset($this->nameSpace)) {
			return 'App\Http\Controllers\\' . $this->nameSpace . '\\' . $this->controller;
		} else {
			return 'App\Http\Controllers\\' . $this->controller;
		}
	}

	public function setUri($uri)
	{

		$this->uri = $uri;
	}


}