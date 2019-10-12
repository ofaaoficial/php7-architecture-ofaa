<?php

namespace ofaa;

use ofaa\Kernel\Database;

class Model extends Database{

    protected $attributes;

    public function __construct($attributes = []){
//        foreach ($attributes as $key => $value){
//            $this->$key = $value;
//        }

        $this->attributes = $attributes;
    }

    /**
     * @param $name
     * @description Sirve para ver las propiedades que se estan intentado acceder. Metodo magico.
     */
    public function __get($name){
        return $name;
    }
}