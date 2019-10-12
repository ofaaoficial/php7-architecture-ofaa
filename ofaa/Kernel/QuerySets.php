<?php

namespace ofaa\Kernel;

class QuerySets{
    public $query;
    public $params;

    public function setQuerySelect($table, $columns){
        $query = "SELECT ";
        if(!is_array($columns)) {
            $query .= "*";
        }else{
            foreach ($columns as $column):
                $query .= $column . ',';
            endforeach;
            $query[strlen($query) - 1] = ' ';
        }
        return $query .= " FROM `{$table}`";
    }

    public function setQueryFind($table, $columns){
        $query = "SELECT ";
        if(!is_array($columns)) {
            $query .= "*";
        }else{
            foreach ($columns as $column):
                $query .= $column . ',';
            endforeach;
            $query[strlen($query) - 1] = ' ';
        }
        return $query .= " FROM `{$table}` WHERE `id` = ?";
    }

    public function select($table, $columns = '*'){
        $this->query = 'SELECT ';
        if(!is_array($columns)){
            $this->query .= $columns;
        }else{
            foreach ($columns as $column):
                $this->query .= $column . ',';
            endforeach;
            $this->query[strlen($this->query) - 1] = ' ';
        }

        $this->query .= " FROM `{$table}`";

        return $this;
    }

    public function where($arr){
        if(empty($this->query)) die('Is required especified table with select');
        if(count($arr) > 0){
            $this->query .= ' WHERE';
            foreach ($arr as $con){
                $this->query .= " `$con[0]` $con[1] ? AND";
                $this->params[] = $con[2];
            }
            $this->query = substr($this->query, 0, -4);
        }
        return $this;
    }
}