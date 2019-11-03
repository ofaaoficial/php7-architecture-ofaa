<?php

namespace ofaa;

use ofaa\Kernel\Database;

class Model extends Database{

    protected $attributes;

    public function __construct($attributes = []){
        $this->attributes = $attributes;
    }

    public function __set($attribute, $value){
        $this->attributes[$attribute] = $value;
    }

    /**
     * @param $name
     * @description Sirve para ver las propiedades que se estan intentado acceder. Metodo magico.
     */
    public function __get($name){
        return $this->getAttribute($name);
    }

    public function getAttribute($attribute){
        if(key_exists($attribute, $this->attributes)) return $this->attributes[$attribute];
        die('Key no exists.');
    }
}