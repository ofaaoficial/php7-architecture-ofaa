<?php

namespace ofaa;

use app\Controllers;

class Router{
    public static $routes = [];

    public static function get($uri, $action){
        return self::register($uri, $action);

    }

    public static function post($uri, $action){
        return self::register($uri, $action, 'POST');
    }

    public function exists($uri){
        foreach (self::$routes as $route){
            if($route['URI'] === $uri) return true;
        }
        return false;
    }

    public function findSpecificURI($uri, $method){
        foreach (self::$routes as $route){
            if($route['method'] === $method && $route['URI'] === $uri) return $route;
        }

        return false;
    }

    public function register($uri, $action, $method = 'GET'){
        if(self::findSpecificURI($uri, $method))
            die("The URI {$uri} with method {$method} exists.");

        self::$routes[] = [
            'URI' => $uri,
            'action' => $action,
            'method' => $method,
        ];

        return true;
    }

    public function setInformationURI($uri, $method){
        $data = self::findSpecificURI($uri, $method);
        $request = explode('@', $data['action']);

        return [
            'controller' => $request[0],
            'method' => $request[1],
            'HTTPMethod' => $data['method'],
        ];
    }

    public static function go($uri, $method){
        if(!self::exists($uri)) die("The URI [{$uri}] is not defined.");

        $request = self::setInformationURI($uri, $method);
        if($request['HTTPMethod'] == $_SERVER['REQUEST_METHOD']){
//            $controller = new $request['controller']();
            $controller = new Controllers\indexController();
            if(method_exists($controller, $request['method']))
                return call_user_func([$controller, $request['method']]);
        }

        return die("The method is incorrect {Router go function}");
    }

}