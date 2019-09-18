<?php
    include_once 'config/ofaa.php';
    
    $controller = isset($_GET['controller']) ? $_GET['controller'] : 'index';
    $method = isset($_GET['method']) ? $_GET['method'] : 'index';

    $controller .= 'Controller';

    if(method_exists($controller, $method)){
        $controller = new $controller;
        call_user_func([$controller, $method]);
    }else{
        die("The method [{$method}] no exists in [{$controller}].");
    }