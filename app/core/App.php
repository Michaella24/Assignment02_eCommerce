<?php
namespace app\core;

class App{
    //to store the routes url
    private $routes = [];

    public function addRoute($url,$handler) {
        $url = preg_replace('/{([^\/]+)}/', '(?<$1>[^\/]+)', $url);
        $this->routes[$url] = $handler;
    }

    public function resolve($url) {
        $matches =[];

        foreach($this->routes as $routePattern => $controllerMethod) {
            if(preg_match("#^$routePattern$#", $url, $matches)) { //if the route matches basically
                $namedParameters = array_filter($matches, function ($key) {
                    return !is_numeric($key);
                },
                ARRAY_FILTER_USE_KEY);
                
                return [$controllerMethod, $namedParameters];
            }
        }
        return false;
    }

function __construct() {
    $url = $_GET['url'];

    include('app/routes.php');

    [$controllerMethod, $namedParameters] = $this->resolve($url);

    if(!$controllerMethod) {
        return;
    }

    [$controller,$method] = explode(',', $controllerMethod);

    $controller = '\app\controllers\\' . $controller;

    $controllerInstance = new $controller();

    if($this->filtered($controllerInstance, $method)) {
        return;
    } //to study

    call_user_func_array([$controllerInstance, $method], $namedParameters);
}

function filtered($controllerInstance, $method) { //to revise !!
            //create an object that can get information about the controller
            $reflection = new \ReflectionClass($controllerInstance);
            //get the attributes from the controller
            $classAttributes = $reflection->getAttributes();
            $methodAttributes = $reflection->getMethod($method)->getAttributes();
    
            $attributes = array_merge($classAttributes,$methodAttributes);
    
            foreach ($attributes as $attribute) {
                //instantiate the filter
                $filter = $attribute->newInstance();
                //run the filter and test if redirected
                if($filter->redirected()){
                    return true;
                }
            }
            return false;
}
}