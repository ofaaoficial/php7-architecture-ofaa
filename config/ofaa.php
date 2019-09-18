<?php

class ofaa{
    public function __construct(){
        $this->autoloader();
        $this->DB_configuration();
    }

    public function autoloader(){
        spl_autoload_register(function($class){
            if(file_exists("controllers/{$class}.php")){
                require_once "controllers/{$class}.php";
            }else if(file_exists("models/{$class}.php")){
                require_once "models/{$class}.php";
            }else{
                die("The file [{$class}] no exists.");
            }
        });
    }

    public function DB_configuration(){
        define('DATABASE', [
            'charset' => 'utf8',
            'dbname' => 'test',
            'username' => 'root',
            'password' => ''
        ]);
    }
}

new ofaa();