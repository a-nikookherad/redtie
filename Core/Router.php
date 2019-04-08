<?php

namespace Core;

//use mysql_xdevapi\Exception;
class Router
{
    protected $uri;
    private $route = [];
    private $routeRegex;
    private $middleWare;
    public $nameSpace;
    private $method;
    private $controller;
    private $parameters = [];
    public static $is404 = false;
    /*file property*/
    private $path = [];
    private $pathUrl;

    public function __construct($uri)
    {
        $explodeUri = explode('?', $uri, 2);
        $this->setUri($explodeUri[0]);
        $this->path = explode('/', rtrim(ltrim($explodeUri[0], '/'), '/'));
        $this->pathUrl = rtrim(ltrim($explodeUri[0], '/'), '/');
    }

    public function setRoute($route, $action)
    {
        //get route regular expression
        $trimRoute = ltrim($route, '/');
        $trimRoute = rtrim($trimRoute, '/');
        $convertRoute = preg_replace('/\//', '\\/', $trimRoute);
        $this->routeRegex = preg_replace('/\{([a-z_]+)\}/', '(?<\1>[a-z0-9-_]+)', $convertRoute);
        $this->routeRegex = "/^" . $this->routeRegex . "$/i";
        // process action parameter and set controller & method & name space & middle ware property
        if (is_array($action)) {
            //run if action is array
            list($this->controller, $this->method) = explode('@', $action['uses']);
            $this->middleWare = $action['middleWare'];
            $this->nameSpace = $action['nameSpace'];
        } else {
            list($this->controller, $this->method) = explode('@', $action);
        }
        // put all data to route array
        $data = [
            "controller" => $this->controller,
            "method" => $this->method,
            "nameSpace" => $this->nameSpace,
            "middleWare" => $this->middleWare,
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
            $run = false;
            $pathUrl = $this->pathUrl;
            $pos = substr($pathUrl, 0, strpos($pathUrl, '/'));
            $pathUrl = str_replace($pos, '', $pathUrl);
            /*------------check file exists*/
            if (file_exists(__DIR__ . '/../App/Modules/' . $this->path[0] . '/mod-cp' . $pathUrl . '.php')) {
                $file = __DIR__ . '/../App/Modules/' . $this->path[0] . '/mod-cp' . $pathUrl . '.php';
//                require_once $file;
//				$this->readFile();
                $view = new View();
                $view->render($file, []);
                $run = true;
                self::$is404 = false;
            }
            /*------------check class and methods(controllers)--------------*/
            $controller = $this->name_Space();

            if ($run == false) {
                if (class_exists($controller)) {
                    $instanceOfController = new $controller;
                    if (isset($this->method) && method_exists($instanceOfController, $this->method) && is_callable([$instanceOfController, $this->method])) {
                        $method = $this->method;
                        call_user_func_array([$instanceOfController, $method], isset($this->parameters) ? $this->parameters : null);
                    } else {
                        throw new \Exception("method {$this->method} is not exist");
                    }
                    self::$is404 = false;
                } else {
                    throw new \Exception("class {$controller} is not exist");
                }
            }
        } else {
            self::$is404 = true;
        }
    }

    /*check for match of uri and route And get parameters of route*/
    public function match()
    {
        $pathUrl = $this->pathUrl;
        $pos = substr($pathUrl, 0, strpos($pathUrl, '/'));
        $pathUrl = str_replace($pos, '', $pathUrl);
        if (preg_match($this->routeRegex, $this->uri, $matches)) {
            //get param with uri and set them to parameters property
            foreach ($matches as $key => $match) {
                if (is_string($key)) {
                    $this->parameters[$key] = $match;
                }
            }
            return true;
            /*------------check file exists*/
        } elseif (!empty($this->path[0]) && file_exists(__DIR__ . '/../App/Modules/' . $this->path[0] . '/mod-cp' . $pathUrl . '.php')) {
            return true;
        } else {
            return false;
        }
    }


    /*create name space for controller file*/
    public function name_Space()
    {
        if (isset($this->nameSpace)) {
            return 'App\Controllers\\' . $this->nameSpace . '\\' . $this->controller;
        } else {
            return 'App\Controllers\\' . $this->controller;
        }
    }

    public function setUri($uri)
    {
        $uri = ltrim($uri, '/');
        $uri = rtrim($uri, '/');
        $this->uri = $uri;
    }


}