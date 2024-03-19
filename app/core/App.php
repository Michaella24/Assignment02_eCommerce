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

    // if($this->filtered($conntrollerInstance, $method)) {
    //     return;
    // } //to study

    call_user_func_array([$controllerInstance, $method], $namedParameters);
}
}