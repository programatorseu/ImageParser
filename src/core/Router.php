<?php

namespace DevPiotr\Core;
class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];
    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }


    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        $this->abort();
    }
    protected function callAction($controller, $action)
    {
        $controller =  "DevPiotr\\Controllers\\{$controller}";
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            throw new \Exception(
                "{$controller} does not respond to the {$action}"
            );
        }
        return $controller->$action();
    }

    protected function abort()
    {
        http_response_code(404);
        require "views/404.view.php";
        die();
    }
}
