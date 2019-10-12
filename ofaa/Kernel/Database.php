<?php

namespace ofaa\Kernel;

class Database extends QuerySets{

    public function connect(){
        try{
            return new \PDO("mysql:host=" . DATABASE['host'] . ";dbname=" . DATABASE['dbname'] . ";charset=utf8;",
                DATABASE['username'],
                DATABASE['password'],
                [
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                ]);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function all($table, $columns = '*'){
        $result = $this->connect()->prepare($this->setQuerySelect($table, $columns));
        $result->execute();
        return $result->fetchAll();
    }

    public function find($table, $id, $columns = '*'){
        $result = $this->connect()->prepare($this->setQueryFind($table, $columns));
        $result->bindParam(1, $id, \PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
    }

    public function get(){

        $result = $this->connect()->prepare($this->query);
        $counter = 1;
        foreach ($this->params as $param){
            $result->bindParam($counter++, $param, \PDO::PARAM_STR);
        }
        $result->execute();
        return $result->fetchAll();
    }

}