<?php

class DB{
    public $table;
    
    public function __construct(){
        if(empty($this->table)) die('Table undefined.');
    }

    public function connection(){
        try{
            return new PDO("mysql:host=localhost;dbname=". DATABASE['dbname'] .";charset=". DATABASE['charset'] .";", DATABASE['username'], DATABASE['password'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                ]);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function all(){
        try{
            $result = $this->connection()->prepare("SELECT * FROM {$this->table}");
            $result->execute();
            return $result->fetchAll();
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
}