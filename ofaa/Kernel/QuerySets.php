<?php

namespace ofaa\Kernel;

class QuerySets{
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
        return $query .= " FROM {$table}";
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
        return $query .= " FROM {$table} WHERE id = ?";
    }
}